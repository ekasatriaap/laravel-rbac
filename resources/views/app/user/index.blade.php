<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                @slot('toolbar')
                    @can("$permission_name.tambah")
                        <button type="button" class="btn btn-sm btn-primary" data-title="Tambah User"
                            data-url="{{ route("{$permission_name}.create") }}" onclick="actionModalData(this)">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    @endcan
                @endslot

                <x-form method="GET" id="form-filter">
                    <x-card-filter class="mb-5">
                        <div class="col-lg-9">
                            <x-form-select-inline label="Role" class="form-select-sm" name="fid_role" id="id-role"
                                :options="$roles" placeholder="Semua role.." value="" />
                        </div>
                    </x-card-filter>
                </x-form>

                <div class="table-responsive">
                    {{ $dataTable->table(['class' => 'table table-striped']) }}
                </div>
            </x-card>
        </div>
    </x-row>

    @push('add-scripts')
        {!! $dataTable->scripts() !!}
        <script>
            $(document).ready(function() {
                setFilterDataTable(['#id-role'], `#${DATATABLE_ID}`);
            });
        </script>
    @endpush
</x-app-layout>
