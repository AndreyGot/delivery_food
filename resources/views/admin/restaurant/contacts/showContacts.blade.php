<?php /* @var App\Model\RestaurantContacts $restaurantContact */?>
<h2>{{ $headingTitle }}</h2>
<button id="zz-editRestaurantContacts" class="btn btn-default"data-toggle="modal" data-target="#zz-editContactsForm">
    Редактировать
</button>
<a class="btn btn-danger" href="{{ route('admin_restaurant_contacts_remove', [
        $restaurant,
        $restaurantContact
    ]) }}">Удалить</a>
<p>Email: {{ $restaurantContact->email }}</p>
<p>Телефон 1: {{ $restaurantContact->phone_1 }}</p>
<p>Телефон 2: {{ $restaurantContact->phone_2 }}</p>
<p class="thumbnail">Описание: {{ $restaurantContact->description }}</p>
<script>
    $(function () {
        $('#zz-editRestaurantContacts').bind('click', function (event) {

        });
    })
</script>



<!-- Modal -->
<div class="modal fade" id="zz-editContactsForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                @include('admin.restaurant.contacts.contactsForm', [
                    'action' => $action,
                    'restaurant' => $restaurant,
                    'headingTitle' => $headingTitle,
                    'restaurantContact' => $restaurantContact
                ])
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>