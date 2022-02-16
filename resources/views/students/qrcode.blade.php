 @extends('layouts.print')

@section('content')
    <br/>
    <br/>
    <br/>
    <br/>
    <div  class="row" >
        <div class="col-md-1"></div>
        <div class="col-md-4" style="border:1px solid black; text-align:center;">
            <h1>{{ $projectcompany->project->name }} ของบริษัท {{ $projectcompany->company->name }} </h1>
            @php
                $url = url('students/register/'.$projectcompany->id);
                echo QrCode::size(250)->generate($url);
            @endphp
        </div>
        <div class="col-md-7"></div>
    </div>
    <br/>
    <br/>
    <br/>
                
            </td>
        </tr>
    </table>
    
@endsection