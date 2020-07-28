<div class="my-4">
    <form action="{{ $action }}", method="post">

        @csrf
        @if ($update ?? false)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <input type="text" name="cliente" id="cliente" class="form-control" placeholder="Nome do cliente"
            value="{{ $atendimento->cliente ?? old('cliente') }}">
        </div>

        <div class="form-group">
            <label for="tipo_id">Tipo de atendimento</label>
            <select class="form-control" name="tipo_id" id="tipo_id">
                <option value="">-- Selecione um tipo</option>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}" 
                    {{ $atendimento->tipo_id ?? old('tipo_id') == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="observacao">Observação</label>
          <textarea class="form-control" name="observacao" id="observacao" 
          rows="4">{{ $atendimento->observacao ?? old('observacao') }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="reset" class="btn btn-secondary">Limpar</button>            
        </div>
    </form>
</div>