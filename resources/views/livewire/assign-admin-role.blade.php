<div class="dark:text-gray-100">
	<span class="w-full text-2xl pl-2 uppercase pb-10">
		<svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
		</svg>
		Users: 
	</span>
	@if(session()->has('message'))
	<span class="text-green-600 w-full mb-3 bg-green-200 py-1 px-3 border-2 border-green-900 rounded-full">
		{{ session('message') }}
	</span>
	@endif
	<div class="w-full flex pb-4">
		<div class="w-3/6 mx-1">
			<input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search users...">
		</div>
		<div class="w-1/6 relative mx-1">
			<select wire:model="sortField" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
				<option value="id">ID</option>
				<option value="name">Name</option>
				<option value="username">Username</option>
				<option value="role">Role</option>
				<option value="email">Email</option>
				<option value="email_verified_at">Verified</option>
				<option value="deleted_at">Suspended</option>
				<option value="created_at">Sign Up Date</option>
			</select>
			<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
			</div>
		</div>
		<div class="w-1/6 relative mx-1">
			<select wire:model="sortAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
				<option value="1">Ascending</option>
				<option value="0">Descending</option>
			</select>
			<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
			</div>
		</div>
		<div class="w-1/6 relative mx-1">
			<select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
				<option>10</option>
				<option>25</option>
				<option>50</option>
				<option>100</option>
			</select>
			<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
			</div>
		</div>
		<div class="w-1/6 relative mx-1">
			<button wire:click="suspendUsers" class="block appearance-none w-full bg-red-500 border border-gray-200 text-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">Suspend</button>
		</div>
		<div class="w-1/6 relative mx-1">
			<button wire:click="permitUsers" class="block appearance-none w-full bg-indigo-500 border border-gray-200 text-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">Permit</button>
		</div>
		<div class="w-1/6 relative mx-1">
			<button wire:click="assignAdminRole" class="animate-pulse block appearance-none w-full bg-red-600 border border-gray-200 text-white h-12 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-sm">Assign/Revoke Role</button>
		</div>
	</div>
	@if($users->isNotEmpty())
	<table class="table-auto w-full mb-6">
		<thead>
			<tr>
				<th class="px-4 py-2">&#10003;</th>
				<th class="px-4 py-2">ID</th>
				<th class="px-4 py-2">Name</th>
				<th class="px-4 py-2">Userame</th>
				<th class="px-4 py-2">Role</th>
				<th class="px-4 py-2">Email</th>
				<th class="px-4 py-2">Joined</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td class="border px-4 py-2">
					<input wire:model="selected" value="{{ $user->id }}" type="radio">
				</td>
				<td class="border px-4 py-2">{{ $user->id }}</td>
				<td 
				class="border px-4 py-2 @if($user->deleted_at) text-red-500
				@elseif($user->role === "ADMIN") text-blue-500 font-semibold
				@elseif($user->role === "DEV") text-purple-700 font-semibold @endif"
				>
				{{ $user->name }}
				@if($user->role === "ADMIN")
				<span class="inline-flex bg-blue-700 text-white rounded-full h-6 px-3 justify-center items-center">
					Admin
				</span>
				@endif
				@if($user->role === "DEV")
				<span class="inline-flex bg-purple-700 text-white rounded-full h-6 px-3 justify-center items-center">
					Dev
				</span>
				@endif
				@if(Auth::user()->id === $user->id) 
				<span class="inline-flex bg-gray-700 text-white rounded-full h-6 px-3 justify-center items-center">
					Self
				</span>
				@endif
			</td>
			<td class="border px-4 py-2">{{ $user->username }}</td>
			<td class="border px-4 py-2">
				{{ $user->role }} 
				@if($user->email_verified_at)
				<span class="text-green-500">&#10003;</span>
				@else <span class="text-red-500"> &#10007; </span> @endif 
			</td>
			<td class="border px-4 py-2">{{ $user->email }}</td>
			<td class="border px-4 py-2">{{ $user->created_at->diffForHumans() }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $users->links() !!}
@else
<p class="text-center">Whoops! No users were found 🙁</p>
@endif
</div>