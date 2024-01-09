<div>
    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}"/>
    </x-slot>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="new-edit">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td class="d-flex justify-content-center border-0">
                                            <a href="{{ route('admin.users.show', $user->id) }}"
                                                class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i
                                                    class="fe fe-edit"></i></a>
                                            <form wire:submit='destroy({{$user->id}})'
                                                class="inline-block" wire:confirm="Yakin Ingin Menghapus?">
                                                <button class="btn btn-sm btn-danger badge " type="submit"
                                                    name="action" ><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>