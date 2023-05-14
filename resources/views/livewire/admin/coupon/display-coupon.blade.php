 <div class="card">
     <div class="card-header d-flex align-items-center justify-content-between">
         <h3 class="card-title">{{ __('msgs.all', ['name' => __('product.coupons')]) }}</h3>
         <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
             {{ __('msgs.create', ['name' => __('product.coupon')]) }}
         </a>
     </div>
     <div class="card-body">
         <div id="table-default" class="table-responsive">
             <table id="dataTables" class="table table-vcenter table-mobile-md card-table">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th> {{ __('product.coupon_option') }}</th>
                         <th> {{ __('product.coupon_code') }}</th>
                         <th> {{ __('category.categories') }}</th>
                         <th> {{ __('product.coupon_type') }}</th>
                         <th> {{ __('product.amount_type') }}</th>
                         <th> {{ __('product.amount') }}</th>
                         <th> {{ __('product.expiry_date') }}</th>
                         <th></th>
                     </tr>
                 </thead>
                 <tbody class="table-tbody">
                     @forelse ($coupons as $coupon)
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ __('product.' . App\Model\Coupon::COUPONOPTION[$coupon->option]) }}</td>
                             <td><span class="badge bg-blue-lt">{{ $coupon->code }}</span></td>
                             <td><span class="badge bg-blue">{{ $coupon->categories }}</span></td>
                             <td>{{ __('product.' . App\Model\Coupon::COUPONTYPE[$coupon->type]) }}</td>
                             <td>{{ __('product.' . App\Model\Coupon::AMOUNTTYPE[$coupon->amount_type]) }}</td>
                             <td>{{ $coupon->amount_value }}</td>
                             <td>{{ $coupon->expiry_date }}</td>
                             <td>
                                 <div>
                                     <button wire:click='updateStatus({{ $coupon }})' class="btn position-relative">
                                         {{ $coupon->is_active ? __('msgs.active') : __('msgs.not_active') }}
                                         <span class="badge {{ $coupon->is_active ? 'bg-green' : 'bg-red' }} badge-notification badge-blink"></span>
                                     </button>
                                 </div>
                             </td>
                             <td>
                                 <span class="dropdown">
                                     <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('btns.actions') }}</button>
                                     <div class="dropdown-menu">
                                         <a href="{{ route('admin.coupons.edit', ['coupon' => $coupon]) }}" class="dropdown-item d-flex align-items-center gap-1">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                 <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                 <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                 <path d="M16 5l3 3" />
                                             </svg>
                                             <span>{{ __('btns.edit') }}</span>
                                         </a>
                                         <a href="#" class="dropdown-item d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#modal-danger-{{ $coupon->id }}">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0 text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                 <path d="M4 7l16 0" />
                                                 <path d="M10 11l0 6" />
                                                 <path d="M14 11l0 6" />
                                                 <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                 <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                             </svg>
                                             <span>{{ __('btns.delete') }}</span>
                                         </a>
                                     </div>
                                 </span>
                                 {{-- <x-modal-delete :id="$coupon->id" :action="route('admin.coupons.destroy', ['coupon' => $coupon])" /> --}}
                             </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="9" class="border-bottom-0">
                                 <x-blank-section :url="route('admin.coupons.create')" :content="__('product.coupon')" />
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
             <div class="mt-3">
                 {{ $coupons->links('pagination::bootstrap-5') }}
             </div>
         </div>
     </div>
     <div class="card-footer">
     </div>
 </div>
