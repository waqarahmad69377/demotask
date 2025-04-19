@extends('layout.dashboard')

@section('content')


<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Create a new page
        </h1>
        <a href="{{route('page.index')}}" class="button light">All page</a>
    </div>
</section>
<section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-1 mb-6">
        <form action="{{ route('page.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf
            <div class="card rounded-xl border-2 border-gray-300 shadow-md w-full">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-lock"></i></span>
                        SEO Information
                    </p>
                </header>
                <div class="card-content ">
                    <div class="field">
                        <label class="label" for="metaTitle">Meta Title</label>
                        <div class="control">
                            <input type="text" name="meta_title" id="metaTitle" class="input" value="{{old('meta_title')}}" autofocus>
                        </div>
                        <p class="help">
                            Enter a title for SEO purposes. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="metaDesc">Meta Description</label>
                        <div class="control">
                            <textarea name="meta_description" id="metaDesc" value="{{old('meta_description')}}" class="textarea"></textarea>
                        </div>
                        <p class="help">
                            Provide a brief description of the page. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="metaKeywords">Meta Keywords</label>
                        <div class="control">
                            <input type="text" name="meta_keywords" id="metaKeywords" value="{{old('meta_keywords')}}" class="input">
                        </div>
                        <p class="help">
                            Enter keywords related to the page content. This is what will appear in search engine results
                        </p>
                    </div>
                </div>
            </div>
            <div class="card rounded-xl border-2 border-gray-300 shadow-md w-full">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-fountain-pen-tip text-xl"></i></span>
                        Writer Information
                    </p>
                </header>
                <div class="card-content ">
                    <div class="field">
                        <label class="label" for="writerTitle">Title</label>
                        <div class="control">
                            <input type="text" name="writer_title" id="writerTitle" class="input" value="{{old('writer_title')}}" autofocus>
                        </div>
                        <p class="help">
                            Enter a title for writer section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="writerContent">Content</label>
                        <div class="control">
                            <textarea name="writer_content" id="writerContent" value="{{old('writer_content')}}" class="textarea"></textarea>
                        </div>
                        <p class="help">
                            Enter content for writer section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="selectWriters">Select Writers</label>
                        <div class="control">
                            <div class="select is-multiple">
                                <select name="writers[]" id="selectWriters" multiple>
                                    {{-- @foreach($writers as $writer)
                                        <option value="{{ $writer->id }}">{{ $writer->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <p class="help">
                            Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card rounded-xl border-2 border-gray-300 shadow-md w-full">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-help text-xl"></i></span>
                        Faq's Information
                    </p>
                </header>
                <div class="card-content ">
                    <div class="field">
                        <label class="label" for="faqTitle">Title</label>
                        <div class="control">
                            <input type="text" name="faqs_title" id="faqsTitle" value="{{old('faqs_title')}}" class="input" autofocus>
                        </div>
                        <p class="help">
                            Enter a title for faqs section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="faqContent">Content</label>
                        <div class="control">
                            <textarea name="faq_content" id="faqContent" value="{{old('faq_content')}}" class="textarea"></textarea>
                        </div>
                        <p class="help">
                            Enter content for faq section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="selectFaqs">Select Faqs</label>
                        <div class="control">
                            <div class="select is-multiple">
                                <select name="faqs[]" id="selectFaqs" multiple>
                                    {{-- @foreach($writers as $writer)
                                        <option value="{{ $writer->id }}">{{ $writer->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <p class="help">
                            Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card rounded-xl border-2 border-gray-300 shadow-md w-full">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-tie text-xl"></i></span>
                        Customer's Information
                    </p>
                </header>
                <div class="card-content ">
                    <div class="field">
                        <label class="label" for="customerTitle">Title</label>
                        <div class="control">
                            <input type="text" name="customer_title" id="customerTitle" value="{{old('customer_title')}}" class="input" autofocus>
                        </div>
                        <p class="help">
                            Enter a title for custoner's section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="customerContent">Content</label>
                        <div class="control">
                            <textarea name="customer_content" id="customerContent" value="{{old('customer_content')}}" class="textarea"></textarea>
                        </div>
                        <p class="help">
                            Enter content for customer's section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="selectCustomers">Select Customers</label>
                        <div class="control">
                            <div class="select is-multiple">
                                <select name="customers[]" id="selectCustomers" multiple>
                                    {{-- @foreach($writers as $writer)
                                        <option value="{{ $writer->id }}">{{ $writer->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <p class="help">
                            Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.
                        </p>
                    </div>
                </div>
            </div>  
            <div class="field grouped">
                <div class="control">
                    <button type="submit" class="button blue">
                        Create Page
                    </button>
                </div>
                <div class="control">
                    <a href="{{route('page.index')}}" class="button light">
                        Back
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection


@section('scripts')
    <script>
        $(document).ready(function(){
            $('#selectWriters').select2({
                placeholder: 'Select Writers',
                allowClear: true,
                ajax: {
                    url: '',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('#selectFaqs').select2({
                placeholder: 'Select Faqs',
                allowClear: true,
                ajax: {
                    url: '',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $("#selectCustomers").select2({
                placeholder: 'Select Customers',
                allowClear: true,
                ajax: {
                    url: '',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });

    </script>

@endsection