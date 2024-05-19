<x-filament-panels::page>
{{--    <?php--}}
{{--    $videos = \App\Models\Video::all()->load('userSpecificWatchRecords');--}}
{{--//    $video = $videos->find(2);--}}
{{--//    dd($video->userSpecificWatchRecords()->exists());--}}
{{--//    dd($video->userSpecificWatchRecords[0]->percent_watched === 100);--}}
{{--//    dd($video->userSpecificWatchRecords())--}}
{{--    $syllabusItems = \App\Models\SyllabusItem::all();--}}
{{--    $firstVideoUrl = $videos->first() ? $videos->first()->getFirstMediaUrl('videos') : asset('test.mp4');--}}
{{--    $WatchedRecords = auth()->user()->videoWatchRecords;--}}
{{--    $user = auth()->user();--}}
{{--    $response = \App\Services\TbcCallbackService::getPaymentInfo($user->pay_id);--}}
{{--    $limit = 2;--}}
{{--    if (is_array($response) && $response["status"] === "Succeeded") {--}}
{{--        $limit = $videos->count();--}}
{{--    }--}}
{{--    ?>--}}
    <head>
        <link href="https://vjs.zencdn.net/8.6.1/video-js.css" rel="stylesheet" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .video-js {
                width: 100%;
                height: 100%;
            }
            .video-list{
                height: 100%;width: 30%;padding: 20px;overflow-y: scroll;background-color:black;
            }
            .video-player{
                background: green;width: 100%;height: 100%
            }
            .video-list-wrapper{
                width: auto;height: 15%;border-radius: 6px;background: #18181B;
            }
            .video-list-thumbnail {
                max-width: 65px;
                height: 100%;
                border-radius: 6px 0px 0px 6px;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                object-fit: cover;
            }
            @media (max-width: 929px) {
                .video-list-thumbnail {
                    max-width: 53px;
                    height: 100%;
                    border-radius: 6px 0px 0px 6px;
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    object-fit: cover;
                }
            }
            .video-watched-checkbox {
                appearance: none;
                background-color: transparent;
                width: 20px;
                height: 20px;
                position: relative;
                border: none;
            }

            .video-watched-checkbox:checked {
                background-color: transparent;
            }
            .video-watched-checkbox:checked:hover {
                background-color: transparent;
            }
            .video-image-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            @media (max-width: 600px) {
                .video-image-wrapper {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 5px;
                    flex-direction: column;
                }
            }
        </style>
        <script>
            var quizContainer;
            var quizLoaded = false;
            var allQuizzesCompleted = false;
            function changeVideo(element) {
                var newVideoUrl = element.getAttribute('data-video-url');
                var videoId = element.getAttribute('data-video-id');
                var videoPlayer = videojs('my-video');
                var videoSource = document.getElementById('video-source');
                videoSource.setAttribute('data-current-video-id', videoId);


                allQuizzesCompleted = false;

                if (!quizLoaded) {
                    alert('ვიდეოს გადართვა შესაძლებელია ქვიზის დასრულების შემდეგ');
                    return;
                }
                videoSource.src = newVideoUrl;
                quizContainer.innerHTML = '';
                videoPlayer.load();
                videoPlayer.play();
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var player = videojs('my-video');
                var currentVideoId = null;
                var quizzes = [];
                var quizContainer = document.getElementById('quiz-container');
                var quizLoaded = false;
                var quizCompletedForCurrentVideo = false;
                var hasQuiz = false;

                function checkForQuiz(video_id) {
                    hasQuiz = quizzes.some(q => parseInt(q.video_id) === parseInt(video_id));
                    return hasQuiz;
                }
                player.on('ended', function (){
                    const checkbox = document.getElementById(video-checkbox-${currentId})
                    checkbox.checked = true
                    console.log('damtavrda maamshi', currentId)
                    sendWatchedPercentage(currentId)


                })
                window.changeVideo = function(element) {
                    var video_id = element.getAttribute("data-video-id");
                    if (currentVideoId && checkForQuiz(currentVideoId) && !quizCompletedForCurrentVideo) {
                        alert('ვიდეოს გადართვა შესაძლებელია მხოლოდ ქუიზის დასრულების შემდეგ!');
                        return;
                    }

                    var newVideoUrl = element.getAttribute('data-video-url');
                    currentVideoId = element.getAttribute('data-video-id');
                    quizCompletedForCurrentVideo = false;

                    var videoPlayer = videojs('my-video');
                    var videoSource = document.getElementById('video-source');
                    videoSource.src = newVideoUrl;
                    quizContainer.innerHTML = '';

                    videoPlayer.load();
                    videoPlayer.play();

                };

                function fetchQuizzes() {
                    fetch('/get-quiz', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('#csrf-token').value
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            quizzes = data.quiz;

                        })
                        .catch(error => console.error('Error fetching quizzes:', error));
                }

                function displayQuiz(quiz, displayNextQuiz) {
                    quizLoaded = true;
                    quizContainer.innerHTML = '';

                    var quizTime = document.createElement('div');
                    quizTime.innerHTML = '<h1 style="color: #e5af23; font-size: 20px">Quiz Time!</h1>';

                    var questionDiv = document.createElement('div');
                    questionDiv.textContent = ${quiz.question};

                    var optionsDiv = document.createElement('div');
                    optionsDiv.innerHTML = `
        <label><input type="radio" name="quiz${quiz.id}" value="${quiz.a}">${quiz.a}</label><br>
        <label><input type="radio" name="quiz${quiz.id}" value="${quiz.b}">${quiz.b}</label><br>
        <label><input type="radio" name="quiz${quiz.id}" value="${quiz.c}">${quiz.c}</label><br>
        <label><input type="radio" name="quiz${quiz.id}" value="${quiz.d}">${quiz.d}</label><br>
    `;

                    var submitButton = document.createElement('button');
                    submitButton.textContent = 'Submit Answer';
                    submitButton.addEventListener('click', function() {
                        var selectedOption = document.querySelector(input[name="quiz${quiz.id}"]:checked).value;
                        if (selectedOption === quiz.answer) {
                            alert('პასუხი სწორია!');
                        } else {
                            alert(არასწორია. სწორი პასუხია: ${quiz.answer});
                        }
                        quizContainer.innerHTML = '';
                        displayNextQuiz();
                    });

                    quizContainer.appendChild(quizTime);
                    quizContainer.appendChild(questionDiv);
                    quizContainer.appendChild(optionsDiv);
                    quizContainer.appendChild(submitButton);
                }

                player.on('ended', function() {
                    var quizzesForCurrentVideo = quizzes.filter(q => parseInt(q.video_id) === parseInt(currentVideoId));

                    var selectedQuizzes = quizzesForCurrentVideo.sort(() => 0.5 - Math.random()).slice(0, 5);

                    var currentQuizIndex = 0;

                    function displayNextQuiz() {
                        if (currentQuizIndex < selectedQuizzes.length) {
                            displayQuiz(selectedQuizzes[currentQuizIndex], displayNextQuiz);
                            currentQuizIndex++;
                        } else {
                            quizLoaded = false;
                            quizCompletedForCurrentVideo = true;
                            hasQuiz = false;
                            allQuizzesCompleted = true;
                        }
                    }

                    window.changeVideo = function(element) {
                        var video_id = element.getAttribute("data-video-id");
                        if (currentVideoId && !quizCompletedForCurrentVideo && hasQuiz) {
                            alert('ვიდეოს გადართვა შესაძლებელია მხოლოდ ქუიზის დასრულების შემდეგ!');
                            return;
                        }

                        var newVideoUrl = element.getAttribute('data-video-url');
                        currentVideoId = video_id;
                        quizCompletedForCurrentVideo = false;
                        quizLoaded = false;
                        hasQuiz = false;
                        allQuizzesCompleted = false;

                        var videoPlayer = videojs('my-video');
                        var videoSource = document.getElementById('video-source');
                        videoSource.src = newVideoUrl;
                        quizContainer.innerHTML = '';
                        videoPlayer.load();
                        videoPlayer.play();
                    };

                    displayNextQuiz();
                });


                fetchQuizzes();
            });
        </script>

    </head>
    <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
    <div class="video-player-wrapper flex items-center justify-between" style="height: 50vh;">
        <div class="video-player">
            <video
                id="my-video"
                class="video-js"
                controls
                preload="auto"
                data-setup="{}"
            >
                <source id="video-source" src="{{ $firstVideoUrl }}" type="video/mp4" />
            </video>
            <script src="https://vjs.zencdn.net/8.6.1/video.min.js"></script>
        </div>
        <div class="video-list">
            @foreach($videos as $key => $video)
                @if($key < $limit)
                        <?php
                        $watched100 = false;
                        if ($video->userSpecificWatchRecords->isNotEmpty() && $video->userSpecificWatchRecords[0]->percent_watched === 100) {
                            $watched100 = true;
                        }
                        ?>
                    <div class="video-list-wrapper flex justify-between mb-2 items-center cursor-pointer pl-2"
                         data-video-id="{{ $video->id }}"
                         data-video-url="{{ $video->getFirstMediaUrl('videos') }}">
                        <div class="video-image-wrapper">
                            <input type="checkbox" class="video-watched-checkbox" id="video-checkbox-{{ $video->id }}" {{$watched100 ? 'checked' : ''}} disabled />
                            <span style="font-size: 12px">{{ $video->title }}</span>
                        </div>
                        <img class="video-list-thumbnail"
                             src="{{ $video->getMedia('*')[0]->getFullUrl() }}"
                             alt="Thumbnail for {{ $video->title }}">
                    </div>
                @endif
            @endforeach

            <script>
                var currentId = null
                var videoRecords = null
                document.addEventListener('DOMContentLoaded', function(){

                    getAllRecords().then((mama) =>{
                        mama.forEach(videoRecord =>{
                            const checkbox = document.getElementById(video-checkbox-${videoRecord.video_id})
                            checkbox.checked = true
                        })
                    })

                })

                function sendWatchedPercentage(videoId, percentWatched = 100) {
                    console.log("Sending watched percentage for video ID:", videoId);
                    fetch('/save-video-watch', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            video_id: videoId,
                            percent_watched: percentWatched,
                        }),
                    })
                        .then(response => response.json())
                        .then(data => console.log("Response data:", data))
                        .catch(error => console.error('Error:', error));
                }
                const videoWrapper = document.querySelectorAll('.video-list-wrapper')
                videoWrapper.forEach(video => {
                    video.addEventListener('click', ()=>{
                        // if(currentId !== null){
                        //     const checkbox = document.getElementById(video-checkbox-${currentId})
                        //     console.log(checkbox, currentId)
                        //     checkbox.checked = true
                        //     console.log('shemocunculda')
                        //     sendWatchedPercentage(currentId)
                        // }
                        currentId = video.getAttribute('data-video-id')
                        changeVideo(video)
                    })

                })
            </script>




        </div>
    </div>
    <div id="quiz-container" style="margin-top: 5px; margin-left: 200px">

    </div>

    <div class="flex flex-1">
        <div class="flex flex-col gap-7 lg:px-[50px] lg:py-[70px] rounded-[30px]">
            <div>
                <h2 class="text-[16] lg:text-[25px] font-bold text-black dark:text-white text-center">სილაბუსი</h2>
            </div>
            <div>
                @foreach($syllabusItems as $item)
                    <div>
                        <div id="card1" class="flex justify-between text-[15px] lg:text-[18px] text-black dark:text-white font-[600] my-[22px] lg:my-[28px] firagoBold uppercase cursor-pointer duration-500 ease-in-out">
                            {{ $item->title }} <img id="arr-icon1" class="w-5 lg:w-6" src="https://reeducate.space/_next/static/media/caret-down.7f797aa2.svg" alt="">
                        </div>
                        <ul id="content1" class="pl-[22px] text-black dark:text-white text-[13px] lg:text-[19px] list-disc marker:text-[#91c6ea] border-b border-gray-400 max-h-[0px] overflow-y-hidden">
                            @foreach($item->bullet_points as $point)
                                <li class="mb-[15px]">{{ $point }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <script>

        document.addEventListener("DOMContentLoaded", function () {
            const cardHeaders = document.querySelectorAll("#card1");
            const contentDivs = document.querySelectorAll("#content1");
            const arrowIcons = document.querySelectorAll("#arr-icon1");

            cardHeaders.forEach((cardHeader, index) => {
                cardHeader.addEventListener("click", function () {
                    if (contentDivs[index].style.maxHeight === "0px" || !contentDivs[index].style.maxHeight) {
                        contentDivs[index].style.maxHeight = contentDivs[index].scrollHeight + "px";
                        arrowIcons[index].classList.add('rotate-180');

                    } else {
                        contentDivs[index].style.maxHeight = "0px";
                        arrowIcons[index].classList.remove('rotate-180');
                    }
                });
            });
            contentDivs.forEach((contentDiv) => {
                contentDiv.style.transition = "max-height 0.3s ease-in-out";
            });
        });
    </script>
</x-filament-panels::page>
