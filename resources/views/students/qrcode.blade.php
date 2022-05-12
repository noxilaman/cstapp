 @extends('layouts.print')

@section('content')
    <br/>
    <br/>
    <br/>
    <br/>
    <div  class="row" >
        <div class="col-md-3"></div>
        <div class="col-md-6" style="text-align:center;">
            <h1>{{ $projectcompany->project->name }}  </h1>
            <h1>สมัครสมาชิกของโรงแรม{{ $projectcompany->company->name }} </h1><br/>
            @php
                $url = url('students/register/'.$projectcompany->id);
                echo QrCode::size(250)->generate($url);
            @endphp
        </div>
        <div class="col-md-3"></div>
    </div>
    <br/>
    <br/>
    <br/>
                
            </td>
        </tr>
    </table>
    
@endsection