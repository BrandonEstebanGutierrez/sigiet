<div class="row">
    <div class="col-md-6">
        <div class="card text-bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Bodega con más egresos</h5>
                <p class="card-text fs-4">{{ $bodegaTop ?? 'Sin datos' }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card text-bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Top 10 productos más gastados</h5>
                <ul class="list-group">
                    @foreach($topMateriales as $material)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $material->nombre }}
                            <span class="badge bg-primary rounded-pill">{{ $material->total_salidas }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
