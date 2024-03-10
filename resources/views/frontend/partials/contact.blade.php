<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,500&display=swap');

    * {
        box-sizing: border-box;
    }

    /*body {*/
    /*    background-color: #f6f6f6;*/
    /*    font-family: 'Open Sans', sans-serif;*/
    /*    display: flex;*/
    /*    align-items: center;*/
    /*    justify-content: center;*/
    /*    min-height: 100vh;*/
    /*    margin: 0;*/
    /*}*/
    body {
        background-color: #ffffff;
        font-family: 'Open Sans', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /*min-height: 100vh;*/
        margin: 0;
    }
    .container {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        width: 650px;
        max-width: 100%;
    }



    .header {
        border-bottom: 1px solid #f0f0f0;
        background-color: #f7f7f7;
        padding: 20px 40px;
    }

    .header h2 {
        margin: 0;
    }

    .form {
        padding: 30px 40px;
    }

    .form-control {
        margin-bottom: 10px;
        padding-bottom: 20px;
        position: relative;
    }

    .form-control label {
        display: inline-block;
        margin-bottom: 5px;
    }

    .form-control input {
        border: 2px solid #f0f0f0;
        border-radius: 4px;
        display: block;
        font-family: inherit;
        font-size: 14px;
        padding: 10px;
        width: 100%;
    }

    .form-control input:focus {
        outline: 0;
        border-color: #777;
    }

    .form-control.success input {
        border-color: #2ecc71;
    }

    .form-control.error input {
        border-color: #e74c3c;
    }

    .form-control i {
        visibility: hidden;
        position: absolute;
        top: 40px;
        right: 10px;
    }

    .form-control.success i.fa-check-circle {
        color: #2ecc71;
        visibility: visible;
    }

    .form-control.error i.fa-exclamation-circle {
        color: #e74c3c;
        visibility: visible;
    }

    .form-control small {
        color: #e74c3c;
        position: absolute;
        bottom: 0;
        left: 0;
        visibility: hidden;
    }

    .form-control.error small {
        visibility: visible;
    }

    .form button {
        background: rgb(0,0,0);
        background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(16,100,133,1) 50%);
        border: 2px solid #041737;
        border-radius: 4px;
        color: #fff;
        display: block;
        font-family: inherit;
        font-size: 16px;
        padding: 10px;
        margin-top: 20px;
        width: 100%;
    }


    .floating-btn:hover {
        background-color: #ffffff;
        color: #001F61;
    }

    .floating-btn:focus {
        outline: none;
    }

    .floating-text {
        background-color: #001F61;
        border-radius: 10px 10px 0 0;
        color: #fff;
        font-family: 'Muli';
        padding: 7px 15px;
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        z-index: 998;
    }

    .floating-text a {
        color: #FF7500;
        text-decoration: none;
    }

    /* (Just ignore)top banner style */
    .top-banner {
        margin-bottom: 30px;
        text-align: center;
        background-color: #ea4c4c;
    }

    .top-banner a, .top-banner span {
        display: inline-block;
    }

    .top-banner a {
        width: 100%;
        padding: 15px 0;
        text-decoration: none;
        color: #fff;
        color: rgba(255, 255, 255, .8);
    }

    .top-banner span {
        width: 50px;
        heigth: 28px;
        line-height: 28px;
        background-color: #a1c45a;
        border-radius: 20px;
    }

    .top-banner a:hover {
        color: #fff9e0;
    }

    @media screen and (max-width: 480px) {

        .social-panel-container.visible {
            transform: translateX(0px);
        }

        .floating-btn {
            right: 10px;
        }
        .notification {
            position: fixed;
            top: 50%;
            right: 0;
            transform: translate(0, -50%);
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            z-index: 1;
            display: none;
        }
        div#notification {
            background-color: #ff7c0d;
            /* border-block: 17px; */
            color: white;
            font-family: monospace;

        }
        .close-notification {
            margin-left: 15px;
            cursor: pointer;
        }
    }
</style>

<body>
<div class="banner-container">
    <div class="banner">
        <!-- Your banner content goes here -->
        <img src="https://www.vfuae.com/wp-content/uploads/2023/11/VF-ACTIVE-Abu-dhabi.jpg" alt="Banner Image">
        {{--        <div class="banner-content">--}}
        {{--            <h2>Your Banner Heading</h2>--}}
        {{--            <p>Your banner description or content goes here.</p>--}}
        {{--        </div>--}}
    </div>
</div>
<div class="container">
    <div class="header">
        <h2 style="text-align: center">Active Abu Dhabi Form </h2>
        <div id="notification" class="notification">
            @if(session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message') }}
                    <button class="close-notification">X</button>
                </div>
            @endif
        </div>
    </div>
    <form class="form" action="{{ route('contact') }}" method="post">
        @csrf

        <div class="form-control">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" placeholder="Enter Your First Name Here" id="first_name" required />
        </div>
        <div class="form-control">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" placeholder="Enter Your Last Name Here" id="last_name" required />
        </div>
        <div class="form-control">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Enter Your Email Address" id="email" required />
        </div>
        <div class="form-control">
            <label for="team_name">Team Name</label>
            <input type="text" name="team_name" placeholder="Enter Your Team Name" id="team_name" required />
        </div>
        <div id="participants">
            <div class="form-control">
                <label for="participant_name">Participant Name</label>
                <input type="text" name="participant_name[]" placeholder="Enter Participant Name" class="participant-name" />
                {{--                <button class="remove-participant">Remove</button>--}}
            </div>
        </div>
        <button id="add-participant">Add More Participant (Optional)</button>
        <button type="submit">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        // Add participant field
        $("#add-participant").click(function (e) {
            e.preventDefault();
            $("#participants").append(
                '<div class="form-control">' +
                '<label for="participant_name">Participant Name</label>' +
                '<input type="text" name="participant_name[]" placeholder="Enter Participant Name" class="participant-name" />' +
                '<button class="remove-participant">Remove</button>' +
                '</div>'
            );
        });

        // Remove participant field
        $(document).on("click", ".remove-participant", function (e) {
            e.preventDefault();
            $(this).parent().remove();
        });

        // Close notification
        $(".close-notification").click(function () {
            $("#notification").hide();
        });
    });
</script>
</body>









