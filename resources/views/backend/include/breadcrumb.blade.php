<section class="content-header">
    <h1>
        {{$header['title']}}
    </h1>
    <ol class="breadcrumb">
        @php 
        $count = count($header['breadcrumb']); 
        $temp = 1;
        @endphp 
        @foreach($header['breadcrumb'] as $key => $value)

        @php 
        $value = (empty($value)) ? 'javascript:;' : $value; @endphp
        @if($temp!=$count)
        <li class="breadcrumb-item"><a href="{{ $value }}">@if($temp == 1)<i class="fa fa-dashboard">@endif</i> {{ $key }} </a></li>
        @else
        <li class="breadcrumb-item active">{{ $key }}</li>
        @endif
        @php $temp = $temp+1; @endphp
    @endforeach

    </ol>
</section>
