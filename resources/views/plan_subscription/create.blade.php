<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.create')}} {{trans('tomato-subscription::global.subscription.single')}}</h1>

    <x-splade-form :default="[
        'model_type'=> '0',
        'status' => 'pending',
        'is_current' => true
    ]" class="flex flex-col space-y-4" action="{{route('admin.plan-subscription.store')}}" method="post">

          <x-splade-select label="{{trans('tomato-subscription::global.subscription.types')}}" placeholder="{{trans('tomato-subscription::global.subscription.types')}}" name="model_type"  choices>
              @foreach(config('tomato-subscription.types') as $key=>$type)
                  <option value="{{$key}}">{{$type['label']}}</option>
              @endforeach
          </x-splade-select>
          <x-splade-select v-if="form.model_type" label="{{trans('tomato-subscription::global.subscription.subscriber')}}" placeholder="{{trans('tomato-subscription::global.subscription.subscriber')}}" name="model_id" remote-url="`/admin/plans/${form.model_type}/api`" remote-root="model" option-label="name" option-value="id" choices/>
          <x-splade-select label="{{trans('tomato-subscription::global.subscription.plan_id')}}" placeholder="{{trans('tomato-subscription::global.subscription.plan_id')}}" name="plan_id" remote-url="/admin/plans/api" remote-root="model.data" option-label="name.{{app()->getLocale()}}" option-value="id" choices/>
        <x-splade-select name="status" label="{{trans('tomato-subscription::global.subscription.status')}}" placeholder="{{trans('tomato-subscription::global.subscription.status')}}" choices>
            <option value="pending">{{trans('tomato-subscription::global.subscription.statues.pending')}}</option>
            <option value="active">{{trans('tomato-subscription::global.subscription.statues.active')}}</option>
            <option value="canceled">{{trans('tomato-subscription::global.subscription.statues.canceled')}}</option>
        </x-splade-select>
          <x-splade-checkbox name="is_current" label="{{trans('tomato-subscription::global.subscription.is_current')}}" />

        <x-splade-submit label="{{trans('tomato-admin::global.crud.create-new')}} {{trans('tomato-subscription::global.subscription.single')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
