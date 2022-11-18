@extends('backend.layouts.app')

@section('title', $data['p_heading'])


@section('content')


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="float-left pt-2"><strong>{{ $data['p_heading'] }}</strong></div>
                    <div class="float-right"><button class="btn btn-info" onclick="regenerate_sitemap();"><i class="fas fa-sync"></i> Re-generate Sitemap</button></div>
                </div><!--card-header-->
                <div class="card-body">



                    @if(sizeof($data['settings']) > 0)

                            <p>{{ $data['p_description'] }}</p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                    @foreach($data['settings'] as $setting)
                                        <tr>
                                            <td width="35%">{{ $setting->name }}:</td>
                                            <td>{{ $setting->key_value }}</td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td colspan="2">
                                                <a href="{{ url('/sitemap.xml?s='.time()) }}" target="_blank">Click here to see the sitemap</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                    @else
                        <strong>Sorry!</strong>, no settings found.
                    @endif



                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->






@stop