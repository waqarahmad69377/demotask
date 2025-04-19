@extends('layout.dashboard')

@section('content')

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Create a new customer
        </h1>
        <a href="{{route('customer.index')}}" class="button light">Back to customers</a>
    </div>
</section>


<section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-1 mb-6">
        <div class="card w-full">
            <div class="card-content w-full">
                <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    {{-- Customer Number --}}
                    <div class="field">
                        <label class="label" for="custPhone">Customer Number <span class="text-red-500 text-xs">*</span></label>
                        <div class="control">
                            <input type="text" name="cust_phone" id="custPhone" value="{{old('cust_phone')}}" class="input" pattern="[a-zA-Z]{2}-[0-9]{6}" autofocus />
                        </div>
                        <p class="help">
                            Enter a unqiue customer number in the format XX-123456. The first two characters should be letters and the last six should be numbers.
                            <br>Example: AB-123456
                        </p>
                    </div>

                    {{-- Name field --}}
                    <div class="field">
                        <label class="label" for="custName">Name <span class="text-red-500 text-xs">*</span></label>
                        <div class="control">
                            <input type="text" name="cust_name" id="custName" value="{{old('cust_name')}}" class="input" />
                        </div>
                        <p class="help">Enter the customer's full name.</p>
                    </div>

                    {{-- Review field --}}
                    <div class="field">
                        <label class="label" for="custReview">Review (Optional)</label>
                        <div class="control">
                            <textarea name="cust_review" id="custReview" class="textarea">{{old('cust_review')}}</textarea>
                        </div>
                        <p class="help">Enter a review for the customer.</p>
                    </div>
                    
                    {{-- Comment field --}}
                    <div class="field">
                        <label class="label" for="custComment">Comment / Text (Optional)</label>
                        <div class="control">
                            <textarea name="cust_comment" id="custComment" class="textarea">{{old('cust_comment')}}</textarea>
                        </div>
                        <p class="help">Enter a comment for the customer.</p>
                    </div>

                    {{-- About field --}}
                    <div class="field">
                        <label class="label" for="custAbout">About (Optional)</label>
                        <div class="control">
                            <textarea name="cust_about" id="custAbout" class="textarea">{{old('cust_about')}}</textarea>
                        </div>
                        <p class="help">Enter a description about the customer.</p>
                    </div>

                    {{-- Rating field --}}
                    <div class="field">
                        <label class="label" for="custRating">Rating (Optional)</label>
                        <div class="control">
                            <input type="number" name="cust_rating" id="custRating" value="{{old('cust_rating')}}" class="input" min="1" max="5" step="0.1" />
                        </div>
                        <p class="help">Enter a rating for the customer (1-5).</p>
                    </div>

                    {{-- Number of Reviews field --}}
                    <div class="field">
                        <label class="label" for="custNumReviews">Number of Reviews (Optional)</label>
                        <div class="control">
                            <input type="number" name="cust_num_reviews" id="custNumReviews" value="{{old('cust_num_reviews')}}" class="input" min="0" />
                        </div>
                        <p class="help">Enter the number of reviews for the customer.</p>
                    </div>

                    {{--  Date field --}}
                    <div class="field">
                        <label class="label" for="custDate">Date (Optional)</label>
                        <div class="control">
                            <input type="date" name="cust_date" id="custDate" value="{{old('cust_date')}}" class="input" />
                        </div>
                        <p class="help">Enter the date for the customer.</p>
                    </div>

                    {{-- Image field --}}
                    <div class="field">
                        <label class="label" for="custImage">Image (Optional)</label>
                        <div class="control">
                            <input type="file" name="cust_image" id="custImage" class="input" accept="image/*" />
                        </div>
                        <p class="help">Upload an image for the customer.</p>
                    </div>
                    <div>
                    <button type="submit" class="button blue">Create Customer</button>
                    <a href="{{route('customer.index')}}" class="button light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@endsection 