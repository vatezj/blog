@extends('admin.layouts.app')
@section('css')
    <link href="//cdn.bootcss.com/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/simplemde/1.11.2/simplemde.min.css" rel="stylesheet">
@endsection
@section('content')
    <div id="upload-img-url" data-upload-img-url="{{ route('upload.image') }}" style="display: none"></div>
    <div class="row">
        <div class="col-md-12">
            <div id="data" class="widget widget-default" data-id="{{ $post->id . '.by@' . request()->ip() }}">
                <div class="widget-header">
                    <h6><i class="fa fa-pencil  fa-fw"></i>编辑文章</h6>
                </div>
                <div class="widget-body edit-form">
                    <form role="form" class="form-horizontal" action="{{ route('post.update',$post->id) }}" method="post">
                        @include('admin.post.form-content')
                        <input type="hidden" name="_method" value="put">
                        <button type="submit" class="btn btn-primary">
                            修改
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//cdn.bootcss.com/select2/4.0.3/js/select2.min.js"></script>
    <script src="//cdn.bootcss.com/simplemde/1.11.2/simplemde.min.js"></script>
    <script>
        $("#post-tags").select2({
            tags: true
        });
        $(document).ready(function () {
            var simplemde = new SimpleMDE({
                autoDownloadFontAwesome: true,
                autosave: {
                    enabled: true,
                    uniqueId: "post.edit."+$('#data').data('id'),
                    delay: 1000,
                },
                element: document.getElementById("post-content-textarea"),
                renderingConfig: {
                    codeSyntaxHighlighting: true,
                },
                spellChecker: false,
                toolbar: ["bold", "italic", "heading", "|", "quote", 'code', 'ordered-list', 'unordered-list', 'link', 'image', 'table', '|', 'preview', 'side-by-side', 'fullscreen'],
            });
            inlineAttachment.editors.codemirror4.attach(simplemde.codemirror, {
                uploadUrl: $("#upload-img-url").data('upload-img-url'),
                uploadFieldName: 'image',
                extraParams: {
                    '_token': XblogConfig.csrfToken,
                    'type': 'xrt'
                },
            });
        });
    </script>
@endsection