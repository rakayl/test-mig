<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Keyboard Transform</title>
<style>
body{
    font-family: Arial, sans-serif;
    margin:40px;
    background:#fafafa;
}
.container{
    max-width:700px;
}
h2{
    margin-bottom:20px;
}
label{
    font-weight:bold;
}
input,textarea{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:4px;
}
button{
    padding:10px 20px;
    margin-top:15px;
    border:none;
    background:#2c7be5;
    color:white;
    border-radius:4px;
    cursor:pointer;
}
button:hover{
    background:#1a68d1;
}
.result{
    background:#f4f4f4;
    padding:15px;
    margin-top:25px;
    border-radius:5px;
}
.error{
    color:red;
    font-size:14px;
    margin-top:5px;
}
</style>
</head>
<body>
    <div class="container">
        <h2>Keyboard Transform Test</h2>
        <form method="POST" action="{{ route('transform.process') }}">
            @csrf
            <label>Transforms</label>
            <br>
            <input type="text" name="transforms" value="{{ old('transforms', $transforms ?? '') }}"  placeholder="H,V,H,5,V,-12"/>
            @error('transforms')
                    <div class="error">{{ $message }}</div>
            @enderror
            <br><br>
            <label>Text</label>
            <br>
            <textarea name="text" rows="6" placeholder="input text...">{{ old('text', $text ?? '') }}</textarea>
            @error('text')
                    <div class="error">{{ $message }}</div>
            @enderror
            <br>
            <button type="submit">Transform</button>
        </form>
        @if(isset($result))
        <div class="result">
            <h3>Result</h3>
            <p>{{ $result }}</p>
        </div>
        @endif
    </div>
</body>
</html>