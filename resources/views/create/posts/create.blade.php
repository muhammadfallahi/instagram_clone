<div class="tab-content pt-3">
  <div class="tab-pane active">
    <form class="form"  method="post" action="{{ route('post.store', [Auth::user()]) }}" enctype="multipart/form-data">
      @csrf
      <input type="file" style="" id="input-id" name="file-data[]" multiple>
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="name">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="lorem">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <div class="form-group">
                <label for="content">content</label>
                <textarea class="form-control" rows="5" name="content" id="content" placeholder="content" ></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-6 mb-3">
        <div class="col-12 col-sm-5 offset-sm-1 mb-3">
          <div class="mb-2"><b>Keeping in Touch</b></div>
          <div class="row">
            <div class="col">
              <div class="custom-controls-stacked px-2">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="allow_comment" name="allow_comment" value="1" >
                  <label class="custom-control-label" for="allow_comment">allow comment</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button class="btn btn-primary" type="submit">Save post</button>
        </div>
      </div>
    </form>
  </div>
</div>