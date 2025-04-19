@extends('layout.dashboard')

@section('content') 

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Create a Writer
        </h1>
        <a href="{{route('writer.index')}}" class="button light capitalize">All writer</a>
    </div>
</section>

<section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-1 mb-6">
        <form action="{{route('writer.store')}}" method="POST" class="w-full" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf
            @method('POST')
            <div class="card rounded-xl border-2 border-gray-300 shadow-md w-full">
                <div class="card-content ">
                    {{-- Writer Name Field--}}
                    <div class="field relative">
                        <label class="label" for="writerName">Name <span class="text-red-500 text-xs">*</span></label>
                        <div class="control">
                            <input type="text" name="writer_name" id="writerName" class="input" value="{{old('writer_name')}}" autofocus>
                        </div>
                        <p class="help">
                            The Full name of the writer. This will be displayed on the page.
                        </p>
                        @if($errors->has('writer_name'))
                            <p class="text-red-500 text-xs italic absolute right-0 bottom-0">{{$errors->first('writer_name')}}</p>
                        @endif
                    </div>
                    {{-- Writer Slug Field --}}
                    <div class="field">
                        <label class="label" for="writerSlug">Slug <span class="text-red-500 text-xs">*</span></label>
                        <div class="control">
                            <input type="text" class="input" name="writer_slug" id="writerSlug" value="{{old('writer_slug')}}" />
                        </div>
                        <p class="help">
                            The unique identifier for the writer. This will be used in the URL.
                        </p>
                    </div>
                    {{-- Writer Field--}}
                    <div class="field relative">
                        <label class="label" for="writerNo">Writer No <span class="text-red-500 text-xs">*</span></label>
                        <div class="control">
                            <input type="text" name="writer_no" id="writerNo" value="{{old('writer_no')}}" class="input" pattern="[a-zA-Z]{3}-[0-9]{6}" />
                        </div>
                        <p class="help">
                            A unique number assigned to the writer. This can be used for identification purposes. writer no should be in the format of XXX-123456.
                            <br>Example: ABC-123456
                        </p>
                        @if($errors->has('writer_no'))
                            <p class="text-red-500 text-xs italic absolute right-0 bottom-0">{{$errors->first('writer_no')}}</p>
                        @endif
                    </div>
                    {{-- About Field--}}
                    <div class="field">
                        <label class="label" for="writerAbout">About</label>
                        <div class="control">
                            <textarea name="writer_about" class="textarea" id="writerAbout" value="{{old("writer_about")}}"></textarea>
                        </div>
                        <p class="help">
                            A brief description about the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Education Field--}}
                    <div class="field">
                        <label class="label" for="writerEdu">Education</label>
                        <div class="control">
                            <input type="text" name="writer_edu" id="writerEdu" value="{{old('writer_edu')}}" class="input" />
                        </div>
                        <p class="help">
                            The educational background of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Profession Field--}}
                    <div class="field">
                        <label class="label" for="writerProfession">Profession</label>
                        <div class="control">
                            <input type="text" name="writer_profession" id="writerProfession" value="{{old('writer_profession')}}" class="input" />
                        </div>
                        <p class="help">
                            The profession of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Status Field--}}
                    <div class="field">
                        <label class="label" for="writerEmail">Status <span class="text-red-500 text-xs">*</span></label>
                        <div class="select">
                            <select name="writer_status" id="writerStatus" class="input">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <p class="help">
                            The current status of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Experience Field--}}
                    <div class="field">
                        <label class="label" for="writerExp">Experience</label>
                        <div class="control">
                            <input type="text" name="writer_exp" id="writerExp" value="{{old('writer_exp')}}" class="input" />
                        </div>
                        <p class="help">
                            The experience of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Rating Field--}}
                    <div class="field">
                        <label class="label" for="writerRat">Rating</label>
                        <div class="control">
                            <input type="number" name="writer_rat" id="writerRat" value="{{old('writer_rat')}}" class="input" />
                        </div>
                        <p class="help">
                            The rating of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Total number of Review Field--}}
                    <div class="field">
                        <label class="label" for="writerRev">Review</label>
                        <div class="control">
                            <input type="number" name="writer_rev" id="writerRev" value="{{old('writer_rev')}}" class="input" />
                        </div>
                        <p class="help">
                            The total number of review of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Order Field--}}
                    <div class="field">
                        <label class="label" for="writerOrd">Order</label>
                        <div class="control">
                            <input type="text" name="writer_ord" id="writerOrd" value="{{old('writer_ord')}}" class="input" />
                        </div>
                        <p class="help">
                            The order of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Success Rate Field--}}
                    <div class="field">
                        <label class="label" for="writerSuccessRate">Success Rate</label>
                        <div class="control">
                            <input type="text" name="writer_success_rate" id="writerSuccessRate" value="{{old('writer_success_rate')}}" class="input" />
                        </div>
                        <p class="help">
                            The success rate of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- On Time Rate Field--}}
                    <div class="field">
                        <label class="label" for="writerOnTimeRate">On Time Rate</label>
                        <div class="control">
                            <input type="text" name="writer_on_time_rate" id="writerOnTimeRate" value="{{old('writer_on_time_rate')}}" class="input" />
                        </div>
                        <p class="help">
                            The on time rate of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{--  Competences Field --}}
                    <div class="field">
                        <label class="label" for="writerCompetences">Competences</label>
                        <div class="control">
                            <input type="text" name="writer_competences" id="writerCompetences" value="{{old('writer_competences')}}" class="input" />
                        </div>
                        <p class="help">
                            The competences of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Works Field --}}
                    <div class="field">
                        <label class="label" for="writerWorks">Works</label>
                        <div class="control">
                            <input type="text" name="writer_works" id="writerWorks" value="{{old('writer_works')}}" class="input" />
                        </div>
                        <p class="help">
                            The works of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Online Status checkbox Field --}}
                    <div class="field">
                        <label class="label" for="writerOnlineStatus">Online Status</label>
                        <div class="control">
                            <input type="checkbox" name="writer_online_status" id="writerOnlineStatus" value="1" {{ old('writer_online_status') ? 'checked' : '' }} />
                        </div>
                        <p class="help">
                            The online status of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Delivery Field --}}
                    <div class="field">
                        <label class="label" for="writerDelivery">Delivery</label>
                        <div class="control">
                            <input type="text" name="writer_delivery" id="writerDelivery" value="{{old('writer_delivery')}}" class="input" />
                        </div>
                        <p class="help">
                            The delivery of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Subjects Field --}}
                    <div class="field">
                        <label class="label" for="writerSubjects">Subjects</label>
                        <div class="control">
                            <input type="text" name="writer_subjects" id="writerSubjects" value="{{old('writer_subjects')}}" class="input" />
                        </div>
                        <p class="help">
                            The subjects of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Reviews Field --}}
                    <div class="field">
                        <label class="label" for="writerReviews">Reviews</label>
                        <div class="control">
                            <input type="text" name="writer_reviews" id="writerReviews" value="{{old('writer_reviews')}}" class="input" />
                        </div>
                        <p class="help">
                            The reviews of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{-- Writer Image Field --}}
                    <div class="field">
                        <label class="label" for="writerImage">Image</label>
                        <div class="control">
                            <input type="file" name="writer_image" id="writerImage" class="input" />
                        </div>
                        <p class="help">
                            The image of the writer. This will be displayed on the page.
                        </p>
                    </div>
                    {{--  Form submit --}}
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button blue">
                                Create Writer
                            </button>
                            {{-- back link --}}
                            <a href="{{route('writer.index')}}" class="button light capitalize">Back</a>
                            {{-- end back link --}}
                        </div>
                        <p class="help">
                            Click the button to create a new writer.
                        </p>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>


@endsection

@section('scripts')
    <script>
        // slug input make it readonly
        $(document).ready(function() {
            $('#writerSlug').attr('readonly', true);
        });
        // end slug input make it readonly
        $(document).ready(function() {
            $('#writerName').on('input', function() {
                var title = $(this).val();
                var slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-');
                $('#writerSlug').val(slug);
            });
        });
        // end convert title in slug and slug input writeable in jquery

    </script>


@endsection