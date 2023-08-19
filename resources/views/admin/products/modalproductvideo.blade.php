<div class="modal fade" id="modalproductvideo">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
        <div class="modal-header">
            <h4 class="modal-title">{{$product['product_name']}} Video</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <video id="productVideo" width="100%" height="95%" controls>
                <source src="{{ url('front/videos/products/'.$product['product_video'])}}">
                {{-- <source src="{{ url('front/videos/products/'.$product['product_video'])}}" type="video/mp4"> --}}
                Your browser does not support the video tag.
            </video>            
        </div>
        {{-- <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-light">Save changes</button>
        </div> --}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>