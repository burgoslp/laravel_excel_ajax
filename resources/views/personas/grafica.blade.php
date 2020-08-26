@extends('../layouts.persona')
@section('contenido')
<div class="col-12">
    <div class="row">
        <div class="col-12">
        	<h1>Grafica de votaciones</h1>

        </div>
        <div class="col-12">
        	<div id="grafica" ></div>
        </div>      
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script>
$().ready(function(){
    	
		let abstinencia= {{count($abstinencia)}};
		let voto= {{count($totalvoto)}};

    	var data = [{
		  values: [abstinencia, voto],
		  labels: ['Abstinencia', 'Voto'],
		  type: 'pie'
		}];

		

		Plotly.newPlot('grafica', data);
})
</script>
@endsection