<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Add Image To PDF File Example - NiceSnippets.com</title>
</head>
<body>
<h1>{{ $title }}</h1>
{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
<br/>
<strong>Public Folder:</strong>
<img src="{{ public_path('CME CERTIFICATE .jpg') }}" style="width: 1250px; height: 750px">
<br/>
<strong>Storage Folder:</strong>
<img src="{{ storage_path('app/public/CME CERTIFICATE .jpg') }}" style="width: 1250px; height: 750px">
</body>
</html>
