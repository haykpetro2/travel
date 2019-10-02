<div class="modal fade" id="background-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Attribute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('background.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="page">Page Name</label>
                                    <select name="page" id="page" class="form-control">
                                        <option value="tour">Tour</option>
                                        <option value="hotel">Hotel</option>
                                        <option value="transport">Transport</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="excursion">Excursion</option>
                                        <option value="blog">Blog</option>
                                        <option value="gallery">Gallery</option>
                                        <option value="faq">Faq</option>
                                        <option value="contact">Contact</option>
                                        <option value="video">Home Video</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Save
                            </button>
                            <button type="reset" class="btn btn-danger mr-1">
                                <i class="ft-x"></i> Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>