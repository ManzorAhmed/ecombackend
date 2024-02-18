@php
    $agenda=\App\Models\Agenda::get();
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<html lang="en">
<!-- Add this line at the top of the file to set the font family -->
<style>
    body {
        font-family: "Myriad Pro", sans-serif;
        margin-top: 2px;
        padding: 0;
    }

    body,
    embed,
    html {
        height: 100%;
        margin: 0px;
        width: 100%;
    }

    embed {
        left: 0;
        position: fixed;
        top: 0;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        margin-top: 25px;
    }

    .left-button {
        /* Add your styles for the left button */
        background-color: #074389;
        color: #fff;
        padding: 10px 20px;
        border-color: #074389;
        font-family: "Myriad Pro", sans-serif;
        font-weight: bold;
        font-size: 20px;
        border-radius: 5px;
        margin-left: 20px;
        text-decoration: none;
    }

    .right-button {
        /* Add your styles for the right button */
        background-color: #074389;
        color: #fff;
        padding: 10px 20px;
        border-color: #074389;
        margin-right: 50px;
        border-radius: 5px;
        font-family: "Myriad Pro", sans-serif;
        font-weight: bold;
        font-size: 20px;
        margin-left: 360px;
        text-decoration: none;
    }

    .day-date-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;

    }

    .day-date {
        text-align: center;
        font-weight: bold;
    }

    .page-break-container {
        page-break-inside: avoid;
    }
</style>

<!-- Set the background image using an inline style -->

<div
    style="background-image: url('{{ $backgroundImage }}'); background-size: cover; position: absolute; width: 100%; height: 100%; z-index: -1;">
    <div class="text-container">
        @php
            $previousHall = null;
            $previousTrack = null;
            $previousSession = null;
            $previousChairSpeaker = null;
        @endphp
        <div class="page-break-container">
            {{-- Add the DAY and DATE on top of each page --}}
            <div class="day-date-container">
                <div class="button-container">
                    <a>
                        <button class="left-button">DAY 01</button>
                    </a>
                    <button class="right-button">{{ $event_date_formatted }}</button>
                </div>
            </div>
            <table
                style="border-collapse: collapse; border: 2px solid rgba(8, 8, 97, 0.8); width: 95%; margin-left: 22px; margin-right: 22px;  vertical-align: middle;">
                <tbody>
                @php
                    $currentHeight = 0;
                    $maxHeight = 1100; // Set the maximum height for the table content to break the page
                @endphp
                @foreach($agenda as $r)
                    {{-- Check if the current row will exceed the maximum height --}}
                    @php
                        $rowHeight = 50; // Set an approximate height for each row
                        $currentHeight += $rowHeight;
                    @endphp

                    {{-- Add the 'page-break-container' class to break the page if the current height exceeds the maximum height --}}
                    @if ($currentHeight > $maxHeight)
                        @php
                            $currentHeight = $rowHeight; // Reset the current height for the next page
                        @endphp
                </tbody>
            </table>
            <!-- Add a page break here -->
            <div style="page-break-before: always;"></div>
            <div class="day-date-container">
                <div class="button-container">
                    <a>
                        <button class="left-button">DAY 01</button>
                    </a>
                    <button class="right-button">{{ $event_date_formatted }}</button>
                </div>
            </div>
            <table
                style="border-collapse: collapse; border: 2px solid rgba(8, 8, 97, 0.8); width: 95%; margin-left: 22px; margin-right: 22px; vertical-align: middle;">
                <tbody>

                @endif
                @if ($r->hall != $previousHall)
                    <tr>
                        <th colspan="2"
                            style="background-color: #fefcff; text-align: center; text-transform: uppercase; font-size: 20px; font-weight: bold; color: #100d0d">{{$r->hall}}</th>
                    </tr>
                @endif
                {{--                @if (!empty($r->track) && $r->track != $previousTrack)--}}
                {{--                    <tr style="background-color: {{ $r->track_color ?? '#ee610a' }}; text-align: center;">--}}
                {{--                        <td class="small-cell pink bold"--}}
                {{--                            style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 16px; font-weight: bold">{{$r->track}}</td>--}}
                {{--                        <td class="large-cell pink bold"--}}
                {{--                            style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 16px;font-weight: bold">{{$r->session}}--}}
                {{--                            :{{$r->chair_speaker}}</td>--}}
                {{--                    </tr>--}}
                {{--                @endif--}}

                @if ($r->session !== $previousSession)
                    @if(!empty($r->session) && empty($r->start_time))
                        <tr style="background-color: {{ $r->session_color ?? '#ee610a' }}; text-align: center;">
                            <td class="small-cell"
                                style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 16px; font-weight: bold"></td>
                            <td class="large-cell"
                                style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 16px; font-weight: bold">
                                @if ($r->start_time === '00:00-00:00')
                                    {{ $r->session }} "{{ $r->cermony }}" <br> {{ $r->chair_speaker }}
                                @else
                                    {{ $r->session }}
                                @endif
                            </td>
                        </tr>
                    @endif
                @endif

                @if($r->track !==  $previousTrack)
                    @if(!empty($r->track) &&empty($r->start_time))
                        <tr style="background-color: {{ $r->track_color ?? '#ee610a' }}; text-align: center;">
                            <td class="small-cell"
                                style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 16px; font-weight: bold"></td>
                            <td class="large-cell"
                                style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 16px;font-weight: bold">{{ $r->session }} {{$r->cermony}}</td>
                        </tr>
                    @endif
                @endif
                @if (!empty($r->start_time) && !empty($r->topic))
                    <tr style="background-color: rgba(243,240,240,0.94); text-align: center;">
                        <td class="small-cell"
                            style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 15px; font-weight: bold">{{$r->start_time}}</td>
                        <td class="large-cell"
                            style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 12px;font-weight: bold; word-wrap: break-word; max-width: 500px; ">{{$r->topic}}
                            <br>{{$r->chair_speaker}}</td>
                    </tr>
                @endif
                @if (!empty($r->start_time) && !empty($r->ceremony))
                    <tr style="background-color: {{ $r->ceremony_color ?? '#ee610a' }}; text-align: center;">
                        <td class="small-cell"
                            style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 15px; font-weight: bold">{{$r->start_time}}</td>
                        <td class="large-cell"
                            style="border: 2px solid rgba(8, 8, 49, 0.8); padding: 10px; text-align: left; text-transform: uppercase; font-size: 12px;font-weight: bold ">{{$r->ceremony}}
                        </td>
                    </tr>
                @endif
                @php
                    $previousHall = $r->hall;
                    $previousTrack = $r->track;
                    $previousSession = $r->session;
                    $previousChairSpeaker = $r->chair_speaker;
                @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</html>
