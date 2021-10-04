@extends('layouts.main')
@section('title', 'Direct')
@section('content')

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href={{ asset('css/direct.css') }}>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">

        <!-- Page header start -->
        <div class="page-title">
            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
            </div>
        </div>
        <!-- Page header end -->

        <!-- Content wrapper start -->
        <div class="content-wrapper">

            <!-- Row start -->
            <div class="row gutters">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="card m-0">

                        <!-- Row start -->
                        <div class="row no-gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                                <div class="users-container">
                                    <!-- search for users -->

                                    <div class="chat-search-box">
                                        <input type="text" class="form-control mb-3" id="input_direct_search" name="search"
                                            placeholder="search">
                                        <ul id="search_direct_result" class="bg-white"
                                            style="display: none; list-style-type: none; width:400px; height:100px"></ul>
                                    </div>
                                    <!-- ----------------- -->
                                    <form action="{{ route('direct.saveChat') }}" method="post">
                                        @csrf
                                        <ul class="users">
                                            <li class="person" data-chat="person1">
                                                <input type="hidden" name="receiver" value="{{ '2' }}">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png"
                                                        alt="Retail Admin">
                                                    <span class="status busy"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">Steve Bangalter</span>
                                                    <span class="time">15/02/2019</span>
                                                </p>
                                            </li>
                                            <li class="person" data-chat="person1">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar1.png"
                                                        alt="Retail Admin">
                                                    <span class="status offline"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">Steve Bangalter</span>
                                                    <span class="time">15/02/2019</span>
                                                </p>
                                            </li>
                                            <li class="person active-user" data-chat="person2">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar2.png"
                                                        alt="Retail Admin">
                                                    <span class="status away"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">Peter Gregor</span>
                                                    <span class="time">12/02/2019</span>
                                                </p>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                                <div class="selected-user">
                                    <span>To: <span class="name">Emily Russell</span></span>
                                </div>
                                <div class="chat-container">
                                    <ul class="chat-box chatContainerScroll" id="scroll">
                                        <li class="chat-left">
                                            <div class="chat-avatar">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png"
                                                    alt="Retail Admin">
                                                <div class="chat-name">Russell</div>
                                            </div>
                                            <div class="chat-text">Hello, I'm Russell.
                                                <br>How can I help you today?
                                            </div>
                                            <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                                        </li>
                                        <li class="chat-right">
                                            <div class="chat-hour">08:56 <span class="fa fa-check-circle"></span></div>
                                            <div class="chat-text">Hi, Russell
                                                <br> I need more information about Developer Plan.
                                            </div>
                                            <div class="chat-avatar">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png"
                                                    alt="Retail Admin">
                                                <div class="chat-name">Sam</div>
                                            </div>
                                        </li>
                                        <li class="chat-left">
                                            <div class="chat-avatar">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png"
                                                    alt="Retail Admin">
                                                <div class="chat-name">Russell</div>
                                            </div>
                                            <div class="chat-text">Are we meeting today?
                                                <br>Project has been already finished and I have results to show you.
                                            </div>
                                            <div class="chat-hour">08:57 <span class="fa fa-check-circle"></span></div>
                                        </li>
                                        <li class="chat-right">
                                            <div class="chat-hour">08:59 <span class="fa fa-check-circle"></span></div>
                                            <div class="chat-text">Well I am not sure.
                                                <br>I have results to show you.
                                            </div>
                                            <div class="chat-avatar">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png"
                                                    alt="Retail Admin">
                                                <div class="chat-name">Joyse</div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-group mt-3 mb-0">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="message"
                                                placeholder="Type your message here...">
                                            <input type="hidden" name="sender" value="{{ auth()->user()->id }}">
                                            <button class="btn btn-info" type="submit">send</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>

                </div>

            </div>
            <!-- Row end -->

        </div>
        <!-- Content wrapper end -->

    </div>

    <script>
        $('#scroll').scrollTop($('#scroll')[0].scrollHeight);
    </script>
    <script type="text/javascript" src="{{ asset('js/DirectSearch.js') }}"></script>

@endsection
