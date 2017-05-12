$('.slider-slick').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: $('.top-arrow'),
    nextArrow: $('.bottom-arrow'),
    arrow: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                arrow: false
            }
        }
    ]
});
