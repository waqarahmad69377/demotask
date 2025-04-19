@extends('layout.dashboard')

@section('content')
<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Edit FAQ
        </h1>
        <a href="{{route('faq.index')}}" class="button light">View all FAQs</a>
    </div>
</section>
@if(Session::has('success'))
    <div class="notification green">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
            <span class="icon"><i class="mdi mdi-buffer"></i></span>
            <b> {{ Session::get('success') }}</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
        </div>
    </div>
    @endif
    <section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-1 mb-6">
        <div class="card w-full">
            <div class="card-content w-full">
                <form action="{{ route('faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="field relative">
                        <label class="label" for="faqQues">Question <span class="text-red-500 text-xs">*</span></label>
                        <div class="control">
                            <input type="text" name="faq_ques"  id="faqQues" value="{{old('faq_ques', $faq->question)}}" class="input" placeholder="Enter question" >
                        </div>
                        <p class="help">Enter the question for the FAQ.</p>
                        @if($errors->has('faq_ques'))
                            <p class="help text-red-500 absolute right-0 bottom-0">{{ $errors->first('faq_ques') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label" for="faqAns">Answer <span class="text-red-500 text-xs">*</span></label>
                        <div class="control">
                            <textarea name="faq_ans" id="faqAns"  class="textarea" placeholder="Enter answer">{{old('faq_ans', $faq->answer)}}</textarea>
                        </div>
                        <p class="help"></p>
                        @if($errors->has('faq_ans'))
                            <p class="help text-red-500 absolute right-0 bottom-0">{{ $errors->first('faq_ans') }}</p>
                        @endif
                    </div>

                    <div class="field is-grouped is-grouped-right">
                        <div class="control">
                            <button type="submit" class="button is-primary blue">Update FAQ</button>
                            <a href="{{ route('faq.index') }}" class="button is-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>

        const {ClassicEditor,Bold,Italic,Font,Paragraph,Essentials} = CKEDITOR;
        const { FormatPainter } = CKEDITOR_PREMIUM_FEATURES;
        ClassicEditor.create(document.querySelector('#faqAns'), {
            licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NDYzMTY3OTksImp0aSI6ImMzMWQyZmQ4LWVmNzctNDlhYy05ZDVhLWVmN2U5Y2QyYTk4NSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6ImJmZWU5NDFjIn0.5sUGzGrXga3vw95GGYh8ndcOkn1Z2Xu42VrM_3bisfaqkT7QXpYz6GW4dIbh03PQ6pvt7_3EUPrCUGUBa1hB6w',

            plugins: [ Essentials, Bold, Italic, Font, Paragraph, FormatPainter ],
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|',
                    'heading',
                    '|',
                    'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
                    '|',
                    'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
                    '|',
                    'link', 'uploadImage', 'blockQuote', 'codeBlock',
                    '|',
                    'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
                ],
                shouldNotGroupWhenFull: true
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                ]
            },
            fontSize: {
                options: [ 9, 11, 13, 'default', 17, 19, 21, 25, 27, 29, 33, 37, 41, 45, 49, 53, 57, 61, 65 ],
                supportAllValues: true
            },
            fontColor: {
                colors: [
                    { color: 'hsl(0, 0%, 0%)', label: 'Black' },
                    { color: 'hsl(0, 0%, 30%)', label: 'Dim grey' },
                    { color: 'hsl(0, 0%, 60%)', label: 'Grey' },
                    { color: 'hsl(0, 0%, 90%)', label: 'Light grey' },
                    { color: 'hsl(0, 100%, 50%)', label: 'Red' },
                    { color: 'hsl(30, 100%, 50%)', label: 'Orange' },
                    { color: 'hsl(60, 100%, 50%)', label: 'Yellow' },
                    { color: 'hsl(120, 100%, 50%)', label: 'Green' },
                    { color: 'hsl(240, 100%, 50%)', label: 'Blue' },
                    { color: 'hsl(270, 100%, 50%)', label: 'Purple' }
                ]
            },
            fontBackgroundColor: {
                colors: [
                    { color: 'hsl(0, 0%, 0%)', label: 'Black' },
                    { color: 'hsl(0, 0%, 30%)', label: 'Dim grey' },
                    { color: 'hsl(0, 0%, 60%)', label: 'Grey' },
                    { color: 'hsl(0, 0%, 90%)', label: 'Light grey' },
                    { color: 'hsl(0, 100%, 50%)', label: 'Red' },
                    { color: 'hsl(30, 100%, 50%)', label: 'Orange' },
                    { color: 'hsl(60, 100%, 50%)', label: 'Yellow' },
                    { color: 'hsl(120, 100%, 50%)', label: 'Green' },
                    { color: 'hsl(240, 100%, 50%)', label: 'Blue' },
                    { color: 'hsl(270, 100%, 50%)', label: 'Purple' }
                ]
            }
        }).catch(error => {
            console.error(error);
        });

    </script>

@endsection