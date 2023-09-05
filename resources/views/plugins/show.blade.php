<x-tomato-admin-container label="{{trans('tomato-plugins::messages.show')}} [{{$data['name']}}]">
    <p>{{$data['description']}}</p>

    <h1 class="text-md font-bold my-4"><span class="text-primary-500">#</span> {{__('Docs')}}</h1>
    <a target="_blank" href="https://www.github.com/{{$data['full_name']}}" class="font-bold text-primary-500">{{__('GitHub')}}</a>


    <h1 class="text-md font-bold my-4"><span class="text-primary-500">#</span> {{__('Start Install The Package')}}</h1>
    <div class="bg-gray-900 rounded-lg flex flex-col justifiy-center items-center ">
        <div class="w-full flex justifiy-start p-2">
            <code class="text-green-500">
                <span class="ml-2">$</span> composer require {{$data['full_name']}}
            </code>
        </div>
    </div>
    @if(count($data['authors']))
        <h1 class="text-md font-bold my-4"><span class="text-primary-500">#</span> {{__('Authors')}}</h1>
        @foreach($data['authors'] as $author)
            <a target="_blank" @if(isset($author['email'])) href="mailto:{{$author['email']}}" @else href="#" @endif class="font-bold text-primary-500">{{$author['name']}}</a>
        @endforeach
    @endif
    @if(count($data['licenses']))
        <h1 class="text-md font-bold my-4"><span class="text-primary-500">#</span> {{__('Licenses')}}</h1>
        @foreach($data['licenses'] as $license)
            <a target="_blank" href="https://www.github.com/{{$data['full_name']}}/blob/master/LICENSE.md" class="font-bold text-primary-500">{{$license}}  License</a>
        @endforeach
    @endif



</x-tomato-admin-container>
