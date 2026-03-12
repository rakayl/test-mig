<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>
                        Keyboard Transform
                    </title>
                    <style>
                        *{
                            box-sizing:border-box;
                        }
                        body{
                            font-family:Arial, Helvetica, sans-serif;
                            margin:0;
                            background:#f5f6fa;
                        }
                        .container{
                            max-width:1000px;
                            margin:auto;
                            padding:20px;
                        }
                        h2{
                            margin-bottom:20px;
                        }
                        .card{
                            background:white;
                            padding:20px;
                            border-radius:8px;
                            box-shadow:0 2px 8px rgba(0,0,0,0.1);
                            margin-bottom:20px;
                        }
                        label{
                            font-weight:bold;
                        }
                        input, textarea{
                            width:100%;
                            padding:10px;
                            margin-top:6px;
                            border:1px solid #ddd;
                            border-radius:4px;
                        }
                        button{
                            margin-top:15px;
                            padding:10px 20px;
                            border:none;
                            background:#3490dc;
                            color:white;
                            border-radius:4px;
                            cursor:pointer;
                        }
                        button:hover{
                            background:#2779bd;
                        }
                        .result{
                            background:#f4f4f4;
                            padding:15px;
                            margin-top:20px;
                            border-radius:5px;
                        }
                        .table-wrapper{
                            overflow-x:auto;
                        }
                        table{
                            width:100%;
                            border-collapse:collapse;
                            margin-top:10px;
                        }
                        th, td{
                            padding:10px;
                            border:1px solid #ddd;
                            text-align:left;
                        }
                        th{
                            background:#f1f1f1;
                        }
                        .pagination{
                            margin-top:15px;
                        }
                        @media(max-width:768px){
                            h2{
                                font-size:20px;
                            }
                            .card{
                                padding:15px;
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h2>
                            Keyboard Transform
                        </h2>
                        <div class="card">
                            <form method="POST" action="{{ route('transform.process') }}">
                                @csrf
                                <label>
                                    Transforms
                                </label>
                                <input type="text" name="transforms" value="{{ $transforms ?? '' }}" placeholder="H,V,H,5,V,-12"/>
                                <br>
                                    <label>
                                        Text
                                    </label>
                                    <textarea name="text" rows="5" placeholder="input text...">{{ $text ?? '' }}</textarea>
                                    <button type="submit">
                                        Transform
                                    </button>
                                </form>
                                @if(isset($result))
                                <div class="result">
                                    <strong>
                                        Result:
                                    </strong>
                                    <p>
                                        {{ $result }}
                                    </p>
                                </div>
                                @endif
                            </div>
                            <div class="card">
                                <h3>
                                    History Transform
                                </h3>
                                <div class="table-wrapper">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>
                                                ID
                                                </th>
                                                <th>
                                                    Transforms
                                                </th>
                                                <th>
                                                    Input
                                                </th>
                                                <th>
                                                    Output
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($history as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration + $history->firstItem() - 1 }}
                                                </td>
                                                <td>
                                                    {{ $item->transforms }}
                                                </td>
                                                <td>
                                                    {{ $item->input_text }}
                                                </td>
                                                <td>
                                                    {{ $item->output_text }}
                                                </td>
                                                <td>
                                                    {{ $item->created_at }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination">
                                    {{ $history->links() }}
                                </div>
                            </div>
                        </div>
                    </body>
                </html>