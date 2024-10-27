<div class="col-lg-12">
    <div class="box-form-add">
        <h5 class="neutral-1000 mb-12">SEO Settings</h5>
        <div class="box-border-bottom">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input class="form-control" type="text" name="meta_title" placeholder="Meta Title"
                            value="{{ $meta->meta_title ?? old('meta_title') }}">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>

                <!-- Keywords Field -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <input class="form-control" type="text" name="meta_keyword" id="keyword-input"
                            placeholder="Enter Seo keywords separate by commas(,)"  value="{{ $meta->meta_keyword ?? old('meta_keyword') }}">
                        @if ($errors->has('meta_keyword'))
                            <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                        @endif
                    </div>
                </div>

                <!-- Content Field -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Write mata description here..." name="meta_description" rows="6">{{ $meta->meta_description ?? old('meta_description') }}</textarea>
                        @if ($errors->has('meta_description'))
                            <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
