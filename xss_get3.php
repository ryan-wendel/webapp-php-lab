<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
<h2 id="title">XSS Vulnerable GET 3</h2>
<script>
    console.log('XSS Vulnerable GET 3');
    let searchParams = new URLSearchParams(document.location.search);
    if(searchParams.has('foo')) {
        var pos=document.URL.indexOf("foo=") + 4;
            document.write('<p>Foo = ' + decodeURI(document.URL.substring(pos, document.URL.length)) + '</p>');
    }
</script>

<img id='kitteh' src='images/kitteh1.jpg' width='200'>

<div class='quote'><p>&ldquo;The major lesson Tiggers need to learn is that if they don't control their impulses, their impulses will control them. No matter how much they do, Tiggers are never satisfied because they don't know the feeling of accomplishment that eventually comes when one persistently applies one's will to the attaining of non-immediately-reachable goals.&rdquo;</p>
<p>&#45 Benjamin Hoff</p></div>
</body>
</html>
