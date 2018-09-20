<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - Twitter API</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
    <h2>Laravel 5 - Twitter API</h2>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Twitter Id</th>
                <th>Message</th>
                <th>Images</th>
                <th>Favorite</th>
                <th>Retweet</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data))
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $value['id'] }}</td>
                        <td>{{ $value['text'] }}</td>
                        <td>
                            @if(!empty($value['extended_entities']['media']))
                                @foreach($value['extended_entities']['media'] as $v)
                                    <img src="{{ $v['media_url_https'] }}" style="width:100px;">
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $value['favorite_count'] }}</td>
                        <td>{{ $value['retweet_count'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <h2>Followers</h2>
    <ul class="">
    @if(!empty($followers))
        @foreach($followers as $key => $value)
        <li><?php echo $value->name . ' / (id:' . $value->id . ')' ?></li>
        @endforeach
    @else
        <li>
            <td colspan="6">There are no data.</td>
        </li>
    @endif
    </ul>

    <h2>Retwitters of <cite>1042455636884246528</cite></h2>
    <ul class="">
    @if(!empty($retweeter))
        @foreach($retweeter as $key => $value)
        <li><?php echo $value->user->screen_name . ' / (id:' . $value->user->id .')' ?></li>
        @endforeach
    @else
        <li>
            <td colspan="6">There are no data.</td>
        </li>
    @endif
    </ul>

    <h4>Chú ý: <cite>Giải pháp kế tiếp là dùng Direct Message cùa Twitter API để gừi Gift code đến cho người trúng thưởng.</cite></h4>
</div>


</body>
</html>