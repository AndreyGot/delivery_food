(function () {
    var version = '1.3.1';
    var modules = {};
    var instance = {};

    this.$ipsp = function (name) {
        if (instance[name])
            return instance[name];
        return (instance[name] = arguments.callee.get(name) );
    };

    this.$ipsp.get = function (name) {
        if (!modules[name])
            throw Error('module is undefined');
        return new modules[name];
    };

    this.$ipsp.add = function (name, module) {
        if (modules[name]) {
            throw Error('module already added');
        }
        modules[name] = module;
    };

    this.$ipsp.version = function (v) {
        version = v;
        return this;
    };

    this.$ipsp._debug_ = (function () {
        return Number(document.cookie.replace(/(?:(?:^|.*;\s*)ipsp_debug\s*\=\s*([^;]*).*$)|^.*$/, "$1"));
    })();

    this.$ipsp.debug = function (state) {
        document.cookie = ['ipsp_debug', Number(state)].join('=');
    };

    this.$ipsp.log = function () {
        if (this._debug_ && 'console' in window) {
            console.log.apply(console, arguments);
        }
    };

}).call(window || {});

(function () {
    this.$oplata = this.$ipsp;
}).call(window || {});

(function () {
    this.addListener = function (el, type, callback) {
        if (!el) return false;
        if (el.addEventListener) el.addEventListener(type, callback);
        else if (el.attachEvent) el.attachEvent('on' + type, callback);
    };
})();


(function () {
    addListener(window, 'error', function (ev) {
        $ipsp.log(ev.message, ev.filename, ev.lineno, ev.colno);
    });
})();

(function () {
    this.camelCase = function (s) {
        return (s || '').toLowerCase().replace(/(\b|-)\w/g, function (m) {
            return m.toUpperCase().replace(/-/, '');
        });
    };
}).call(window || {});

(function () {
    var type = function (o) {
        return ({}).toString.call(o).match(/\s([a-zA-Z]+)/)[1].toLowerCase();
    };
    this.isObject = function (o) {
        return type(o) === 'object';
    };
    this.isRegexp = function (o) {
        return type(o) === 'regexp';
    };
    this.isArguments = function (o) {
        return type(o) === 'arguments';
    };
    this.isError = function (o) {
        return type(o) === 'error';
    };
    this.isArray = function (o) {
        return type(o) === 'array';
    };
    this.isDate = function (o) {
        return type(o) === 'date';
    };
    this.isString = function (o) {
        return type(o) === 'string';
    };
    this.isNumber = function (o) {
        return type(o) === 'number';
    };
    this.isBoolean = function (o) {
        return type(o) === 'boolean';
    };
    this.isElement = function (o) {
        return o && o.nodeType === 1;
    };
    this.getType = type;
}).call(window || {});


(function () {
    this.popupBlocker = function (poppedWindow) {
        var result = false;
        try {
            if (typeof poppedWindow == 'undefined') {
                result = true;
            } else if (poppedWindow && poppedWindow.closed) {
                result = false;
            } else if (poppedWindow && poppedWindow.test) {
                result = false;
            } else {
                result = true;
            }
        } catch (err) {

        }
        return result;
    };
}).call(window || {});

(function () {
    this.prepareFormData = function (url, data, target) {
        var elem;
        var form = document.createElement('form');
        form.action = url;
        form.target = target || '_self';
        form.method = 'POST';
        for (var prop in data) {
            if (data.hasOwnProperty(prop)) {
                elem = document.createElement('input');
                elem.type = 'hidden';
                elem.name = prop;
                elem.value = data[prop];
                form.appendChild(elem);
            }
        }
        form.style.display = 'none';
        return form;
    };
}).call(window || {});

(function () {

    var init = false;
    var fnTest = /xyz/.test(function () {
        xyz;
    }) ? /\b_super\b/ : /.*/;

    this.Class = function () {
        if (!(this instanceof arguments.callee))
            throw Error('use Class with "extend" method');
    };


    this.Class.prototype = {
        init: function () {

        }
    };


    this.Class.extend = function (instance) {
        var prop, proto, parent = this.prototype;
        init = true;
        proto = new this();
        init = false;
        for (prop in instance) {
            if (instance.hasOwnProperty(prop)) {
                if (typeof(parent[prop]) == 'function' &&
                    typeof(instance[prop]) == 'function' &&
                    fnTest.test(instance[prop])
                ) {
                    proto[prop] = (function (name, fn) {
                        return function () {
                            var temp = this._super, result;
                            this._super = parent[name];
                            result = fn.apply(this, arguments);
                            this._super = temp;
                            return result;
                        };
                    })(prop, instance[prop]);
                } else {
                    proto[prop] = instance[prop];
                }
            }
        }
        function Class(options) {


            if (!init)
                this.init.apply(this, arguments);
        }


        Class.prototype = proto;


        Class.prototype.constructor = Class;


        Class.extend = arguments.callee;


        return Class;
    };
}).call(window || {});

(function () {

    var topics = {}, subUid = -1;


    this.publish = function (topic, data) {
        $ipsp.log(topic, data);
        if (!topics[topic]) {
            return false;
        }
        var subscribers = topics[topic], len = subscribers ? subscribers.length : 0;
        var args = Array.prototype.slice.call(arguments, 2);
        var topic = topic.split('/').pop();
        for (i = 0; i < len; i++) {
            subscribers[i].func(data, topic);
        }
        return this;
    };


    this.subscribe = function (topic, func) {
        if (!topics[topic]) {
            topics[topic] = [];
        }
        var token = (++subUid).toString();
        topics[topic].push({
            token: token,
            func: func
        });
        return token;
    };

    this.unsubscribe = function (token) {
        for (var m in topics) {
            if (topics.hasOwnProperty(m) && topics[m]) {
                for (var i = 0, j = topics[m].length; i < j; i++) {
                    if (topics[m][i].token === token) {
                        topics[m].splice(i, 1);
                        return token;
                    }
                }
            }
        }
        return this;
    };
}).call(window.pubsub = {});

(function (window) {
    function contentLoaded(win, fn) {
        var done = false, top = true,
            doc = win.document,
            root = doc.documentElement,
            modern = doc.addEventListener,
            add = modern ? 'addEventListener' : 'attachEvent',
            rem = modern ? 'removeEventListener' : 'detachEvent',
            pre = modern ? '' : 'on',
            init = function (e) {
                if (e.type == 'readystatechange' && doc.readyState != 'complete') return;
                (e.type == 'load' ? win : doc)[rem](pre + e.type, init, false);
                if (!done && (done = true)) fn.call(win, e.type || e);
            },
            poll = function () {
                try {
                    root.doScroll('left');
                } catch (e) {
                    setTimeout(poll, 50);
                    return;
                }
                init('poll');
            };
        if (doc.readyState == 'complete') fn.call(win, 'lazy');
        else {
            if (!modern && root.doScroll) {
                try {
                    top = !win.frameElement;
                } catch (e) {
                }
                if (top) poll();
            }
            doc[add](pre + 'DOMContentLoaded', init, false);
            doc[add](pre + 'readystatechange', init, false);
            win[add](pre + 'load', init, false);
        }
    };
    window.domReady = function (fn) {
        contentLoaded(window, fn);
    };
})(window);


(function () {
    this.Module = Class.extend({


        find: function (selector) {
            return isElement(selector) ? selector : (document.querySelector(selector) || null);
        },

        findAll: function (selector) {
            return document.querySelectorAll(selector);
        },

        extend: function _extend() {
            var i, prop, item, obj = arguments[0], ext = Array.prototype.slice.call(arguments, 1);
            for (i = 0; i < ext.length; i++) {
                if (( item = ext[i]) !== null) {
                    for (prop in item) {
                        if (item.hasOwnProperty(prop)) {
                            obj[prop] = item[prop];
                        }
                    }
                }
            }
            return obj;
        },

        proxy: function (func, wrapper) {
            var wrapper = wrapper || this;
            return function () {
                return func.apply(wrapper, Array.prototype.slice.call(arguments));
            };
        },

        addCss: function (elem, styles) {
            if (!elem)
                return false;
            for (var prop in styles) {
                if (styles.hasOwnProperty(prop)) {
                    elem.style[prop] = styles[prop];
                }
            }
        },

        fireEvent: function (elem, eventName) {
            var evt;
            if (elem) {
                if (document.createEventObject) {
                    evt = document.createEventObject();
                    return elem.fireEvent('on' + eventName, evt);
                } else {
                    evt = document.createEvent("HTMLEvents");
                    evt.initEvent(eventName, true, true);
                    return !elem.dispatchEvent(evt);
                }
            }
        },

        addEvent: function (elem, type, handler) {
            if (elem) {
                if (elem.addEventListener) {
                    elem.addEventListener(type, handler, false);
                } else {
                    elem.attachEvent('on' + type, handler);
                }
            }
            return this;
        },

        removeEvent: function (elem, type, handler) {
            if (elem) {
                if (elem.removeEventListener) {
                    elem.removeEventListener(type, handler, false);
                } else {
                    elem.detachEvent('on' + type, handler);
                }
            }
            return this;
        },


        onDomReady: function (fn) {
            domReady(this.proxy(fn));
            return this;
        },

        addAttr: function (elem, attributes) {
            var prop;
            if (!elem)
                return false;
            for (prop in attributes) {
                if (attributes.hasOwnProperty(prop)) {
                    elem.setAttribute(prop, attributes[prop]);
                }
            }
        },

        scope: function (fn) {
            this.onDomReady(fn);
            return this;
        },
        print: function () {
            var prop, stack = [];
            for (prop in this) {
                stack.push([[this.name, prop].join('.'), getType(this[prop])].join(' : '));
            }
            return stack.join('\n');
        }
    });
}).call(window || {});


(function () {
    var UID = -1;
    this.Connector = Module.extend({
        name: 'crossdomain',
        origin: '*',


        init: function () {
            this.addEvent(window, 'message', this.proxy(this.route));
            this.setName([this.name, ++UID, location.host].join('/'));
        },


        setName: function (name) {
            if (name) {
                this.name = name;
            }
        },

        getName: function () {
            return this.name;
        },

        setTarget: function (target) {
            if (target) {
                this.target = target;
            }
        },


        getTarget: function () {
            return this.target || {
                    postMessage: function () {
                    }
                };
        },


        route: function (ev) {
            var response;
            try {
                response = JSON.parse(ev.data.toString());
            } catch (e) {
                return false;
            }
            if (this.getTarget() !== ev.source)
                return false;
            if (!response.action)
                return false;
            if (response.action == 'origin') {
                this.setOrigin(response.data.origin);
            }
            this.publish(response.action, response.data);
        },

        getOrigin: function () {
            return '*';
        },

        setOrigin: function (url) {
            this.origin = url || '*';
        },

        action: function (action, fn) {
            return pubsub.subscribe([this.name, action].join('/'), fn);
        },

        removeAction: function (token) {
            pubsub.unsubscribe(token);
            return this;
        },

        publish: function (action, data) {
            return pubsub.publish([this.name, action].join('/'), data);
        },


        send: function (action, data) {
            this.getTarget().postMessage(JSON.stringify({
                action: action,
                data: data
            }), this.getOrigin());
        }
    });

    this.$ipsp.add('connector', this.Connector);
}).call(window || {});

(function (URL) {

    var HOST = URL.host;
    var PROTOCOL = URL.protocol;
    var ORIGIN = URL.origin;

    var attrs = {
        frameborder: '0',
        allowtransparency: 'true'
    };

    var styles = {
        'zIndex': '9999',
        'overflowX': 'hidden',
        'border': '0',
        'display': 'none',
        'position': 'static',
        'top': '0px',
        'left': '0px',
        'bottom': '0px',
        'right': '0px',
        'width': '100%',
        'height': '100%'
    };

    var Callback = function (data, type) {
        var form;
        if (data.action == 'redirect') {
            this.loadUrl(data.url);
            return;
        }
        if (data.send_data.order_status == 'processing') {
            return;
        } else {
            this.unbind('ready').action('ready', function () {
                this.show();
            });
        }
        if (data.send_data && data.url) {
            form = prepareFormData(data.url, data.send_data);
            this.find('body').appendChild(form);
            form.submit();
            form.parentNode.removeChild(form);
        }
    };

    var Checkout = Module.extend({

        name: '$ipsp.checkout',

        version: '1.0',

        iframe: null,

        connector: null,
        client_callback: false,


        init: function () {
            this.options = {
                checkout_attr: 'href',
                checkout_url: null,
                wrapper: 'body',
                styles: {},
                ismodal: false
            };
            this.actions = {};
            this.initConnector();
            this.ready();
        },
        config: function (options) {
            this.extend(this.options, options);
            return this;
        },

        setModal: function (bool) {
            this.options.ismodal = bool;
            this.onDomReady(function () {
                this.addCss(this.iframe, {
                    'position': this.options.ismodal === true ? 'fixed' : 'static'
                });
            });
        },

        setCheckoutWrapper: function (wrapper) {
            this.options.wrapper = wrapper;
        },

        setCssStyle: function (styles) {
            this.extend(this.options.styles, styles);
        },
        setCheckoutBg: function (value) {
            this.onDomReady(function () {
                this.addCss(this.iframe, {
                    'background': value
                });
            });
        },
        setCheckoutWidth: function (size) {
            if (size >= 0 || size == 'auto') {
                this.onDomReady(function () {
                    this.addCss(this.iframe, {
                        'width': ''
                    });
                    this.addAttr(this.iframe, {
                        'width': size
                    });
                });
            }
            return this;
        },


        width: function (size) {
            this.setCheckoutWidth(size);
            return this;
        },
        setCheckoutHeight: function (size) {
            if (size >= 0 || size == 'auto') {
                this.onDomReady(function () {
                    this.addCss(this.iframe, {
                        'height': ''
                    });
                    this.addAttr(this.iframe, {
                        'height': size
                    });
                });
            }
        },


        height: function (size) {
            this.setCheckoutHeight(size);
            return this;
        },

        setCheckoutOrigin: function (url) {
            if (!url)
                throw Error('url param is required');
            var link = document.createElement('a');
            link.href = url;
            this.options.checkout_url = link.origin || [link.protocol, link.host].join('//');
            return this;
        },

        getCheckoutOrigin: function () {
            if (!this.options.checkout_url)
                throw Error('checkout url is not defined');
            return this.options.checkout_url;
        },

        setElementAttr: function (attr) {
            this.options.checkout_attr = attr;
        },
        setClickElement: function (selector) {
            this.onDomReady(function () {
                var i, nodes = this.findAll(selector);
                for (i = 0; i < nodes.length; i++) {
                    this.addEvent(nodes[i], 'click', this.proxy(function (ev) {
                        ev.preventDefault();
                        this.loadUrl(ev.target.getAttribute(this.options.checkout_attr));
                    }));
                }
            });
        },
        loadUrl: function (url) {
            if (!url) throw Error('checkout url is not defined');
            this.onDomReady(function () {
                if (!this.iframe)
                    throw Error('checkout iframe is null or undefined');
                this.iframe.src = url;
                this.find(this.options.wrapper).appendChild(this.iframe);
            });
        },
        getCurrentOrigin: function () {
            return ORIGIN || [PROTOCOL, HOST].join('//');
        },

        show: function (silent) {
            if (this.options.ismodal === true) {
                this.addCss(this.find('body'), {
                    'overflow': 'hidden'
                });
                this.addCss(this.find('html'), {
                    'overflow': 'hidden'
                });
            }
            this.addCss(this.iframe, {
                'display': 'block'
            });
            this.iframe.focus();
            if (silent !== true) {
                this.connector.publish('show', {});
            }
            return this;
        },
        hide: function (silent) {
            if (this.options.ismodal === true) {
                this.addCss(this.find('body'), {
                    'overflow': ''
                });
                this.addCss(this.find('html'), {
                    'overflow': ''
                });
            }
            this.addCss(this.iframe, {
                'display': 'none'
            });
            if (silent !== true) {
                this.connector.publish('hide', {});
            }
            return this;
        },
        send: function (action, params) {
            this.connector.send(action, params);
            return this;
        },

        publish: function (action, params) {
            this.connector.publish(action, params);
        },
        action: function (action, callback) {
            var token = this.connector.action(action, this.proxy(callback, this));
            if (!isArray(this.actions[action]))
                this.actions[action] = [];
            this.actions[action].push(token);
            return token;
        },
        removeAction: function (token) {
            this.connector.removeAction(token);
            return this;
        },

        unbind: function (name) {
            var tokens = this.actions[name];
            for (var i = 0; i < tokens.length; i++)
                this.removeAction(tokens[i]);
            return this;
        },

        ready: function () {
            this.onDomReady(this.initFrame);
            return this;
        },
        initFrame: function () {
            if (this.iframe) throw Error('iframe already initialized');
            this.iframe = document.createElement('iframe');
            this.addCss(this.iframe, styles);
            this.addAttr(this.iframe, attrs);
            this.addEvent(this.iframe, 'load', this.proxy(function (frame) {
                this.loadConnector(this.iframe);
            }));
        },
        initConnector: function () {
            this.connector = new Connector;
            this.action('load', function (data) {
                this.send('origin', {
                    origin: this.getCurrentOrigin(),
                    styles: this.options.styles
                });
            });
            this.action('cancel', function (data) {
                if (this.options.ismodal)
                    this.hide();
            });
            this.action('locale', function (data) {
                this.locale = data;
            });
            this.action('ready', function (data) {
                this.show();
            });
            this.action('3dsform', function (data) {
                this.acsCallback(data);
            });
            this.action('callback', this.callback);
        },
        callback: function (data, type) {
            this.send(type, data);
        },
        setAcsCallback: function (fn) {
            this.acsCallback = fn;
        },
        addCallback: function (fn) {
            if (!fn) fn = Callback;
            if (!this.client_callback) {
                this.unbind('callback');
                this.client_callback = true;
            }
            this.action('callback', fn);
            this.action('decline', fn);
            return this;
        },


        acsCallback: function (data) {
            var checkout = this;
            var acsframe = $ipsp('acsframe');
            var popup = $ipsp.get('popup');
            popup.config({
                width: '700px'
            });
            popup.close = this.proxy(function () {
                this.send('cancel');
            });
            this.action('close_submit3ds', function (data) {
                acsframe.send('close');
            });
            popup.title.innerHTML = this.locale.HELP_3DS;
            this.addEvent(popup.title.querySelector('a'), 'click', function () {
                acsframe.submitHelp();
            });
            acsframe.scope(function () {
                this.setData(data);
                this.setLocale(checkout.locale);
                this.setWrapper(popup.content);
                this.action('close', function () {
                    popup.hide();
                });
                this.action('load', function () {
                    popup.show();
                });
                this.action('response', function (data) {
                    checkout.send('cancel');
                    checkout.publish('callback', data);
                    popup.hide();
                });
                this.submit();
            });
        },

        submit3ds: function (data, wrapper) {
            return $ipsp('acssubmit').scope(function () {
                this.setData(data);
                this.setWrapper(wrapper);
            });
        },

        loadConnector: function (frame) {
            this.setCheckoutOrigin(frame.src);
            this.connector.setTarget(frame.contentWindow);
            this.connector.setOrigin(this.getCheckoutOrigin());
        }
    });
    this.__DEFAULTCALLBACK__ = Callback;
    this.Checkout = Checkout;


    this.$ipsp.add('checkout', Checkout);
}).call(window || {}, location || {});
(function () {
    var PROTOCOL = 'https';
    var HOST = 'api.local.devoplata.com';
    var PATH = '/api/checkout?button=';


    var Field = Class.extend({
        init: function (f) {
            this.initialize(f);
        },

        initialize: function (f) {
            this.setName(f.name);
            this.setValue(f.value);
            this.setLabel(f.label);
            this.setPlaceholder(f.placeholder);
            this.setRequired(f.required);
            this.setValid(f.valid);
            this.setReadonly(f.readonly);
        },

        setName: function (name) {
            if (!isString(name))
                console.error('field property `name` is not a string', this);
            this.name = name;
            return this;
        },


        setPlaceholder: function (placeholder) {
            if (placeholder && !isString(placeholder))
                console.error('field property `placeholder` is not a string', this);
            this.placeholder = placeholder;
            return;
        },

        setValue: function (value) {
            if (value && !isString(value))
                console.error('field property `value` is not a string', this);
            this.value = value;
            return this;
        },

        setLabel: function (label) {
            if (!isString(label))
                console.error('field property `label` is not a string', this);
            this.label = label;
            return this;
        },

        setValid: function (valid) {
            var prop, value = [];
            if (valid && !isObject(valid))
                console.error('field property `valid` is not an object', this);
            for (prop in valid)
                if (valid.hasOwnProperty(prop))
                    value.push([prop, valid[prop]].join(':'));
            this.valid = value.concat(this.valid).join(';');
            return this;
        },


        setRequired: function (required) {
            this.valid = '';
            if (required && isBoolean(required))
                this.valid = 'required'
        },


        setReadonly: function (readonly) {
            if (readonly && !isBoolean(readonly))
                console.error('field property `readonly` is not an boolean', this);
            this.readonly = readonly;
            return this;
        }
    });


    var Button = Class.extend({
        init: function () {
            this.data = {
                merchant_id: null,
                currency: null,
                fields: [],
                params: {}
            };
        },

        validate: function () {
            var prop;
            var errors = [];
            var data = this.data;
            for (prop in data)
                if (data.hasOwnProperty(prop) && data[prop] === null)
                    errors.push(['data param -', prop, 'is incorrect'].join(' '))
            return errors;
        },


        setProtocol: function (protocol) {
            if (protocol && protocol.match(/https?/)) {
                PROTOCOL = protocol;
            }
        },

        setHost: function (host) {
            if (host) {
                HOST = host;
            }
        },
        getButton: function (text, style, target) {
            var link = document.createElement('a');
            link.href = this.getUrl();
            link.className = style || '';
            link.innerHTML = text;
            link.target = target;
            return link;
        },


        getUrl: function () {
            var valid;
            if ((valid = this.validate()).length > 0) return console.error(valid.join('\n'));
            return PROTOCOL.concat('://')
                .concat(HOST).concat(PATH)
                .concat(encodeURIComponent(JSON.stringify(this.data)));
        },
        setMerchantId: function (merchant_id) {
            if (!isNumber(merchant_id)) console.error('parameter `merchant_id` is required and must be integer');
            this.data.merchant_id = merchant_id;
        },
        setAmount: function (amount, currency, readonly) {
            if (isNumber(parseInt(amount))) this.data.amount = amount;
            if (isString(currency)) this.data.currency = currency;
            if (isBoolean(readonly) && readonly === true)
                this.data.amount_readonly = readonly;
        },
        setResponseUrl: function (url) {
            if (!isString(url)) console.error('parameter `url` is required and must be string');
            this.addParam('response_url', url);
            return this;
        },
        addField: function (field) {
            if (!isObject(field)) console.error('parameter field is required')
            this.data.fields.push(new Field(field));
            return this;
        },

        addParam: function (name, value) {
            this.data.params[name] = value;
            return this;
        },
        setRecurringState: function (state) {
            this.data.recurring_state = Boolean(state);
        },
        addRecurringData: function (data) {
            this.data.params['subscription'] = 'y';
            this.data.recurring = {
                period: data.period || 'month',
                every: data.every || 1,
                start_time: data.start_time || this.calcStartDate(data) || this.getDefaultStartDate(),
                end_time: data.end_time || this.getDefaultEndDate(),
                amount: this.data.amount || '',
                custom_period: data.period && data.every
            };
        },
        calcStartDate: function (data) {
            if (data.period && data.every) {
                return this.getFuturePeriod(data.period, data.every);
            } else {
                return null;
            }
        },
        getFuturePeriod: function (period, every) {
            var d = new Date();
            switch (period) {
                case 'day':
                    d.setDate(d.getDate() + (1 * every));
                    break;
                case 'week':
                    d.setDate(d.getDate() + (7 * every));
                    break;
                case 'month':
                    d.setMonth(d.getMonth() + (1 * every));
                    break;
            }
            return this.getDateFormat(d);
        },
        getDefaultStartDate: function (period, every) {
            var d = new Date();
            d.setMonth(d.getMonth() + 1);
            return this.getDateFormat(d);
        }
        ,
        getDefaultEndDate: function () {
            var d = new Date();
            d.setFullYear(d.getFullYear() + 5);
            return this.getDateFormat(d);
        },
        getDateFormat: function (d) {
            return d.getFullYear() + "-" + (("0" + (d.getMonth() + 1)).slice(-2)) + "-" + (("0" + d.getDate()).slice(-2))
        }
    });
    this.$ipsp.add('button', Button);
}).call(window || {});

(function () {


    var attrs = {
        'frameborder': '0',
        'allowtransparency': 'true',
        'scrolling': 'no'
    };


    var styles = {
        'zIndex': '9999',
        'overflowX': 'hidden',
        'border': '0',
        'display': 'none',
        'position': 'fixed',
        'top': '0px',
        'left': '0px',
        'bottom': '0px',
        'right': '0px',
        'width': '100%',
        'height': '100%'
    };


    var AscFrame = Module.extend({
        name: '$ipsp.frame3ds',
        frame: null,
        form: null,
        wrapper: 'body',
        isloaded: false,
        options: {
            url: '',
            data: {},
            wrapper: {}
        },

        init: function () {
            this.name = [this.name, Math.round(Math.random() * 1000000000)].join('');
            this.initFrame();
            this.initEvents();
            this.initConnector();
        },

        action: function (name, callback) {
            return pubsub.subscribe([this.name, name].join(':'), callback);
        },

        send: function (name, data) {
            pubsub.publish([this.name, name].join(':'), data || {});
            return this;
        },

        removeAction: function (token) {
            pubsub.unsubscribe(token);
            return this;
        },


        setLocale: function (locale) {
            this.locale = locale;
        },


        initEvents: function () {
            this.addEvent(this.iframe, 'load', this.proxy(function () {
                this.loadConnector();
                this.send('load', {});
                this.addCss(this.iframe, {
                    'height': '720px'
                });
            }));
        },


        initFrame: function (selector) {
            this.iframe = this.find(selector) || document.createElement('iframe');
            this.iframe.name = this.name;
            this.iframe.id = this.name;
            this.addAttr(this.iframe, attrs);
            this.addCss(this.iframe, {
                'width': '100%',
                'height': '100%',
            });
        },


        initConnector: function () {
            this.connector = new Connector;
            this.connector.action('response', this.proxy(function (data, type) {
                this.send(type, data);
            }));
        },


        loadConnector: function () {
            this.connector.setTarget(this.iframe.contentWindow);
        },


        setData: function (data) {
            this.extend(this.options, data);
            return this;
        },


        setWrapper: function (wrapper) {
            if (isString(wrapper)) {
                this.wrapper = this.find(wrapper);
            } else {
                this.wrapper = wrapper;
            }
            if (!wrapper) {
                throw Error('acsframe element wrapper is undefined');
            }
            return this;
        },


        submitHelp: function () {
            this.form = prepareFormData(this.options.url, this.options.send_data, this.name);
            this.form.target = "_blank";
            this.wrapper.appendChild(this.form);
            this.form.submit();
        },


        submit: function () {
            this.form = prepareFormData(this.options.url, this.options.send_data, this.name);
            this.wrapper.appendChild(this.iframe);
            this.wrapper.appendChild(this.form);
            this.form.submit();
        }
    });


    this.$ipsp.add('acsframe', AscFrame);
}).call(window || {});

(function () {
    var AscSubmit = Module.extend({
        name: '$ipsp.frame3ds',
        target: '_blank',
        frame: null,
        form: null,
        wrapper: 'body',
        isloaded: false,
        options: {
            url: '',
            data: {},
            wrapper: {},
        },


        init: function () {
            this.name = [this.name, Math.round(Math.random() * 1000000000)].join('');
            this.initEvents();
        },


        action: function (name, callback) {
            return pubsub.subscribe([this.name, name].join(':'), callback);
        },

        send: function (name, data) {
            pubsub.publish([this.name, name].join(':'), data || {});
            return this;
        },


        removeAction: function (token) {
            pubsub.unsubscribe(token);
            return this;
        },


        initEvents: function () {
            this.action('close', this.proxy(function () {
                this.find(this.wrapper).removeChild(this.form);
            }));
        },


        setData: function (data) {
            this.extend(this.options, data);
            return this;
        },


        setWrapper: function (wrapper) {
            if (!wrapper) {
                throw Error('asc submit wrapper element is undefined');
            }
            if (isString(wrapper)) {
                this.wrapper = this.find(wrapper);
            } else if (isElement(wrapper)) {
                this.wrapper = wrapper;
            }
            return this;
        },


        submit: function () {
            this.form = prepareFormData(this.options.url, this.options.send_data, this.name);
            this.wrapper.appendChild(this.form);
            this.popup = window.open('about:blank', this.name);
            if (this.popup && popupBlocker(this.popup)) {
                this.form.submit();
            } else {
                this.send('blocked3dsPopup', this.options);
            }
            return this;
        }
    });

    this.$ipsp.add('acssubmit', AscSubmit);
}).call(window || {});

(function () {


    var styles = {};


    styles.modal = {
        'display': 'block',
        'overflow': 'hidden',
        'position': 'relative',
        'background': '#fff',
        'zIndex': '99999',
        'boxShadow': '0px 0px 5px rgba(0,0,0,0.2)'
    };


    styles.title = {
        'margin': '0px',
        'overflow': 'hidden',
        'padding': '17px 20px',
        'fontFamily': 'Arial, Helvetica',
        'lineHeight': '14px',
        'fontSize': '12px'
    };


    styles.button = {
        'display': 'block',
        'float': 'right',
        'position': 'relative',
        'fontWeight': 'bold',
        'fontSize': '48px',
        'padding': '0 8px',
        'lineHeight': '100%',
        'cursor': 'pointer'
    };


    styles.wrapper = {
        'position': 'fixed',
        'top': '0px',
        'left': '0px',
        'right': '0px',
        'bottom': '0px',
        'zIndex': '9999',
        'display': 'none',
        'overflowY': 'auto',
        'background': 'rgba(0,0,0,0.1)'
    };
    var Popup = Module.extend({


        init: function () {
            this.wrapper = this.elem('div', styles.wrapper);
            this.wrapper.className = 'oplata_popup_wrapper ipsp_popup_wrapper';
            this.modal = this.elem('div', styles.modal);
            this.modal.className = 'oplata_popup_modal ipsp_popup_modal';
            this.toolbar = this.elem('div');
            this.toolbar.className = 'oplata_popup_toolbar ipsp_popup_toolbar';
            this.title = this.elem('div');
            this.title.className = 'oplata_popup_title ipsp_popup_title';
            this.addCss(this.title, styles.title);
            this.closelink = this.elem('a');
            this.closelink.className = 'oplata_popup_close ipsp_popup_close';
            this.closelink.innerHTML = '&times';
            this.addEvent(this.closelink, 'click', this.proxy(function (ev) {
                ev.preventDefault();
                this.hide();
                this.close();
            }));
            this.addCss(this.closelink, styles.button);
            this.toolbar.appendChild(this.closelink);
            this.toolbar.appendChild(this.title);
            this.addCss(this.toolbar, {
                'position': 'relative',
                'zIndex': '5',
                'overflow': 'hidden'
            });
            this.content = this.elem('div');
            this.content.className = 'oplata_popup_content';
            this.addCss(this.content, {
                'position': 'relative',
                'zIndex': '2'
            });
            this.modal.appendChild(this.toolbar);
            this.modal.appendChild(this.content);
            this.wrapper.appendChild(this.modal);
            this.find('body').appendChild(this.wrapper);
        },


        elem: function (tag, styles) {
            var elem = document.createElement(tag);
            if (styles)
                this.addCss(elem, styles);
            return elem;
        },


        config: function (config) {
            this.addCss(this.modal, {
                'top': '100px',
                'left': '50%',
                'marginLeft': -(parseInt(config.width, 10) / 2) + 'px',
                'width': config.width || 'auto',
                'height': config.height || 'auto'
            });
        },

        show: function () {
            this.addCss(this.wrapper, {
                'display': 'block'
            });
            this.addCss(this.find('body'), {
                'overflow': 'hidden'
            });
            this.addCss(this.find('html'), {
                'overflow': 'hidden'
            });
        },

        hide: function () {
            this.addCss(this.wrapper, {
                'display': 'none'
            });
            this.addCss(this.find('body'), {
                'overflow': ''
            });
            this.addCss(this.find('html'), {
                'overflow': ''
            });
            if (this.wrapper.parentNode) {
                this.wrapper.parentNode.removeChild(this.wrapper);
            }
        },


        close: function () {
        }
    });


    this.$ipsp.add('popup', Popup);
}).call(window || {});