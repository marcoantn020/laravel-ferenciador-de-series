<x-layout title="Editar serie: {!! $series->name !!} ">
    <x-series.form-update
        :action="route('series.update', $series->id)"
        :name="$series->name"
    />
</x-layout>
