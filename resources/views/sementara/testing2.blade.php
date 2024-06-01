@extends('layouts.main')

@section('container')
    <div class="mt-20">
        <h1 class="tx-black">hello mas</h1>
        <!-- Open the modal using ID.showModal() method -->
        <button class="btn" onclick="my_modal_2.showModal()">open modal</button>
        <dialog id="my_modal_2" class="modal">
        <div class="modal-box z-50" style="z-index: 10!important">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click outside to close</p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
        </dialog>
    </div>  
@endsection

