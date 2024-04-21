<div class="">
    @isset($product)
    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
        <!-- Semi-transparent overlay -->
        <div class="absolute inset-0 bg-black opacity-50 w-full h-full" wire:click="hideDetails"></div>

        <!-- Product details card -->
        <div class="bg-gray-100 p-6 rounded-lg relative z-50 border flex flex-col items-center justify-start w-full max-w-md lg:max-w-[55rem] mx-7 overflow-y-auto" style="height: 37rem;">
            <div class="w-full flex justify-end py-2 mb-2">
                <button wire:click="hideDetails">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                    </svg>
                </button>
            </div>
            <div >
                <div class="carousel" data-carousel>
                    <button type="button" class="carousel-control-prev bg-black bg-opacity-60 rounded-full w-10 h-10 top-[50%] left-2" data-carousel-button="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button type="button" class="carousel-control-next bg-black bg-opacity-60 rounded-full w-10 h-10 top-[50%] right-2" data-carousel-button="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                    <ul data-slides>
                        <li class="slide" data-active>
                            <img class="d-block w-100 h-xl rounded-md object-fill" src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/assets/' . $product->image) }}" alt="{{ $product->name }}" style="max-height: 350px;">
                        </li>
                        <li class="slide">
                            <img class="d-block w-100 h-xl rounded-md object-cover text-black" src="" alt="hello" style="max-height: 350px;">
                        </li>
                        <li class="slide">
                            <img class="d-block w-100 h-xl rounded-md object-cover" src="" alt="hi" style="max-height: 350px;">
                        </li>
                    </ul>

                    <style>
                        *, *::before, *::after{
                            box-sizing: border-box;
                        }

                        /* .carousel{
                            width: 50vw;
                            height: 50vw;
                            position: relative;
                        } */

                        .carousel > ul{
                            margin: 0;
                            padding: 0;
                            list-style: none;
                        }

                        .slide{
                            inset: 0;
                            opacity: 0;
                        }

                        .slide > img{
                            display: block;
                            
                        }

                        .slide[data-active]{
                            opacity: 1;
                        }

                        .carousel-button{
                            position: absolute;
                            background:none;
                            border: none;
                            font-size: 4rem;
                            top: 50%;
                            transform: translateY( -50% );
                            cursor: pointer;
                        }

                        .carousel-button:hover,
                        .carousel-button:focus{
                            color:white;
                            background-color: rgba(0, 0, 0, .2);
                        }

                        .carousel-button:focus{
                            outline: 1px solid black;
                        }

                        .carousel-button.prev{
                            left: 1rem;
                        }

                        .carousel-button.next{
                            right: 1rem;
                        }
                    </style>

                    <script>
                        const buttons = document.querySelectorAll("[data-carousel-button]")

                        buttons.forEach(button => {
                            button.addEventListener("click", () => {
                                const offset = button.dataset.carouselButton === "next" ? 1 : -1
                                const slides = button.closest("[data-carousel]").querySelectorAll("[data-slides]")

                                const activeSlide = slides.querySelector("[data-active]")
                                let newIndex = [...slides.children].indexOf(activeSlide) + offset
                                if (newIndex < 0 ) newIndex = slides.children.length -1
                                if  (newIndex >= slides.children.length) newIndex=0

                                slides.children[newIndex].dataset.active = true
                                delete activeSlide.dataset.active
                            })
                        })
                    </script>



                </div>



                <!-- HTML with Tailwind CSS classes -->
            </div>
            <table class="w-full border-spacing-x-2">
                <tr class="h-14">
                    <th colspan="2" class="text-center font-semibold">Product Details</th>
                </tr>
                <tr class="h-9">
                    <td class="w-1/3 text-left text-gray-500 flex h-full">Name:</td>
                    <td class="w-2/3 text-left">
                        {{ $product->name }}
                    </td>
                </tr>
                <tr class="h-9">
                    <td class="w-1/3 text-left text-gray-500 flex h-full">Price:</td>
                    <td class="w-2/3 text-left">
                        ₱ {{ $product->price }}
                    </td>
                </tr>
                <tr class="h-9">
                    <td class="w-1/3 text-left text-gray-500 flex h-full">Description:</td>
                    <td class="w-2/3 text-left">
                        {{ $product->description }}
                    </td>
                </tr>
                <tr class="h-9">
                    <td class="w-1/3 text-left text-gray-500 flex h-full">Stock:</td>
                    <td class="w-2/3 text-left">
                        {{ $product->stockquantity == 0 ? 'Out of Stock' : $product->stockquantity }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @endisset
</div>