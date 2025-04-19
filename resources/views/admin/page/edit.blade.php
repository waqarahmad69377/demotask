@extends('layout.dashboard')

@section('content')


<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Edit a page
        </h1>
        <a href="{{route('page.create')}}" class="button light">Create a new page</a>
    </div>
</section>
<section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-1 mb-6">
        <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf
            @method('PUT')
            {{-- General information --}}
            <div class="card rounded-xl border-2 border-gray-300 shadow-md w-full">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-lock"></i></span>
                        General Information
                    </p>
                </header>
                <div class="card-content ">
                    <div class="field relative">
                        <label class="label" for="title">Title <span class="text-red-500 text-xs">*</span></label>
                        <div class="control">
                            <input type="text" name="title" id="title" class="input" value="{{old('title', $page)}}" autofocus>
                        </div>
                        <p class="help">
                            Enter a title for the page. This is what will appear in search engine results
                        </p>
                        @if($errors->has('title'))
                            <p class="help text-red-500 absolute right-0 bottom-0">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="field relative">
                        <label class="label" for="titleSlug">Slug <span class="text-red-500 text-xs">*</span></label>
                        <div class="control">
                            <input type="text" name="title_slug" id="titleSlug" class="input" value="{{old('title_slug',$page->slug)}}" />
                        </div>
                        <p class="help">
                            Enter a slug for the page. This is what will appear in search engine results
                        </p>
                        @if($errors->has('title_slug'))
                            <p class="help text-red-500 absolute right-0 bottom-0">{{ $errors->first('title_slug') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            {{-- SEO information --}}
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
                            <input type="text" name="meta_title" id="metaTitle" class="input" value="{{old('meta_title',$page)}}" autofocus>
                        </div>
                        <p class="help">
                            Enter a title for SEO purposes. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="metaDesc">Meta Description</label>
                        <div class="control">
                            <textarea name="meta_description" id="metaDesc" class="textarea">{{old('meta_description',$page)}}</textarea>
                        </div>
                        <p class="help">
                            Provide a brief description of the page. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="metaKeywords">Meta Keywords</label>
                        <div class="control">
                            <input type="text" name="meta_keywords" id="metaKeywords" value="{{old('meta_keywords',$page)}}" class="input">
                        </div>
                        <p class="help">
                            Enter keywords related to the page content. This is what will appear in search engine results
                        </p>
                    </div>
                </div>
            </div>
            {{-- Writer Information --}}
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
                            <input type="text" name="writer_title" id="writerTitle" value="{{old('writer_title',$page)}}" class="input" autofocus>
                        </div>
                        <p class="help">
                            Enter a title for writer section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="writerContent">Content</label>
                        <div class="control">
                            <textarea name="writer_content" id="writerContent" class="textarea">{{old("writer_content",$page)}}</textarea>
                        </div>
                        <p class="help">
                            Enter content for writer section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="selectWriters">Select Writers</label>
                        <div class="control">
                            <div class="select">
                                <select name="writers[]" id="selectWriters" multiple>
                                    @foreach($writers as $writer)
                                        <option value="{{ $writer->id }}" selected>{{ $writer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p class="help">
                            Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.
                        </p>
                    </div>
                </div>
            </div>
            {{-- Faq's Information --}}
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
                            <input type="text" name="faqs_title" id="faqsTitle" class="input" value="{{old('faqs_title',$page->faq_title)}}" autofocus>
                        </div>
                        <p class="help">
                            Enter a title for faqs section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="faqContent">Content</label>
                        <div class="control">
                            <textarea name="faq_content" id="faqContent" class="textarea">{{old('faq_content',$page)}}</textarea>
                        </div>
                        <p class="help">
                            Enter content for faq section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="selectFaqs">Select Writers</label>
                        <div class="control">
                            <div class="select is-multiple">
                                <select name="faqs[]" id="selectFaqs" multiple>
                                    @foreach($faqs as $faq)
                                        <option value="{{ $faq->id }}" selected>{{ $faq->question }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p class="help">
                            Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.
                        </p>
                    </div>
                </div>
            </div>
            {{-- Customer's Information --}}
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
                            <input type="text" name="customer_title" id="customerTitle" value="{{old('customer_title',$page)}}" class="input" autofocus>
                        </div>
                        <p class="help">
                            Enter a title for custoner's section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="customerContent">Content</label>
                        <div class="control">
                            <textarea name="customer_content" id="customerContent" class="textarea">{{old("customer_content",$page)}}</textarea>
                        </div>
                        <p class="help">
                            Enter content for customer's section. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="selectCustomers">Select Customers</label>
                        <div class="control">
                            
                            <div class="select">
                                <select name="customers[]" id="selectCustomers" multiple>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" selected>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p class="help">
                            Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.
                        </p>
                    </div>
                </div>
            </div>  
            {{-- Image information --}}
            <div class="card rounded-xl border-2 border-gray-300 shadow-md w-full">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-image text-xl"></i></span>
                        Image Information
                    </p>
                </header>
                <div class="card-content ">
                    {{-- preview image  --}}
                    <div class="field">
                        <label class="label" for="pageImage">Preview Image</label>
                        <div class="control">
                            <img id="previewImage" src="{{url('/storage/'.$page->page_image)}}" alt="Preview Image" class="w-32 h-32 rounded-lg object-cover">
                        </div>
                        <p class="help">
                            Preview of the image you will upload
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="pageImage">Feature Image (Optional)</label>
                        <div class="control">
                            <input type="file" name="page_image" id="pageImage" value="{{old('page_image')}}" class="input" autofocus>
                        </div>
                        <p class="help">
                            Upload an image for the page. This is what will appear in search engine results
                        </p>
                    </div>
                    <div class="field">
                        <label class="label" for="pageImageAlt">Feature Image Alt (Optional)</label>
                        <div class="control">
                            <input type="text" name="page_image_alt" id="pageImageAlt" value="{{old('page_image_alt',$page)}}" class="input" autofocus>
                        </div>
                        <p class="help">
                            Enter alt text for the image. This is what will appear in search engine results
                        </p>
                    </div>
                </div>
            </div> 
            {{-- creating card of page status --}}
            <div class="card rounded-xl border-2 border-gray-300 shadow-md w-full">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-lock"></i></span>
                        Page Status
                    </p>
                </header>
                <div class="card-content ">
                    <div class="field">
                        <label class="label" for="pageStatus">Page Status</label>
                        <div class="control">
                            <select name="page_status" id="pageStatus" class="input">
                                <option value="active" @if($page->status === 'active' ) selected @endif>Active</option>
                                <option value="inactive" @if($page->status === 'inactive' ) selected @endif>Inactive</option>
                            </select>
                        </div>
                        <p class="help">
                            Select the status of the page. This is what will appear in search engine results
                        </p>
                    </div>
                </div>
            </div>
            <div class="field grouped">
                <div class="control">
                    <button type="submit" class="button blue">
                        Update Page
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
            // convert title in slug and slug input writeable 
            $('#titleSlug').attr('readonly', true);
            $('#titleSlug').attr('placeholder', 'Slug will be generated automatically');
            $('#title').on('focus', function() {
                $(this).attr('placeholder', 'Title will be generated automatically');
            });

            $('#title').on('keyup', function() {
                var title = $(this).val();
                var slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $('#titleSlug').val(slug);
            });

            $('#selectWriters').select2({
                placeholder: 'Select Writers',
                allowClear: true,
                ajax: {
                    url: '{{ route('writers.select') }}',
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
                    url: '{{ route('faqs.select') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    id: item.id,
                                    text: item.question
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
                    url: '{{ route('customers.select') }}',
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