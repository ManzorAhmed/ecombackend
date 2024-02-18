<!DOCTYPE html>
<html>
<head>
    <title>Download HTML</title>
</head>
<body>
<div>
    {!! $htmlView !!}
</div>
<script>
    // JavaScript to trigger the download
    window.onload = function() {
        let htmlContent = document.querySelector('div').innerHTML;
        let blob = new Blob([htmlContent], { type: 'text/html' });
        let url = URL.createObjectURL(blob);
        let a = document.createElement('a');
        a.href = url;
        a.download = 'agenda.html';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    };
</script>
</body>
</html>
