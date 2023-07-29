<style>
#drop {
    width: 100%;
    /* border: none; */
}

.dropCont {
    display: flex;
    padding: 2vh;
    justify-content: space-between;
    /* background-color:blue; */
    border: 2px;
    border-radius: 10px;
    margin: 1vh;
    box-shadow: 1px 0px 20px #888888;
}

.dropCont:hover {
    cursor: pointer;
}

.hide {
    display: none;
}

.delete {
    margin: 0 2vh;
}

.show{
	margin: 1vh;
    padding: 2vh;
}

/* #drop svg {
		display: inline;
	} */
</style>
@if(!$isIterable)
@foreach($section?->inputs as $name => $input)
<div>
    <label for="{{ $section->name }}_{{ $name }}_id">{{ $name }}</label>
    {!! $input->getHtmlText($section->pivot?->data[$name], false) !!}
</div>
@endforeach
@else
<div class="iterable">
    @if($section?->pivot?->data)
    @foreach($section?->pivot?->data as $object)
    @foreach($section->inputs as $name => $input)
    <div>
        <label for="{{ $section->name }}_{{ $name }}_id">{{ $name }}</label>
        {!! $input->getHtmlText($object[$name], true) !!}
    </div>
    @endforeach
    @endforeach
    @endif

</div>
<!-- new div -->
<div id="new-slots-container" class="color"></div>
<!-- new div -->
<button type="button" class="btn btn-success add-slot" style="margin-top: 2vh; ">+</button>
@endif

@if($isIterable)

<script>
document.addEventListener("DOMContentLoaded", function() {
    const addSlotBtn = document.querySelector(".add-slot");
    addSlotBtn.addEventListener("click", function() {
        let html = `

			<div id="drop"  >
			<div class="dropCont btn"  id="dropCont" >
			<span class="tit">Title</span>
			<button type="button" class="delete" onclick="del()">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 del">
            <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5"></path>
			</svg>
			</button>
			</div>
				<div class="hide show">
				@foreach($section->inputs as $name => $input)
				<div >
					<label for="{{ $section->name }}_{{ $name }}_id">{{ $name }}</label>
							{!! $input->getHtmlText("", true) !!}
				</div>
@endforeach
				</div>
				</div>
				`;
        const newSlotsContainer = document.querySelector("#new-slots-container");
        newSlotsContainer.insertAdjacentHTML('beforeend', html);
        add();
        index++;
        // let drop=document.querySelectorAll(".dropCont");
        // console.log(drop)
    });

    document.addEventListener("click", function(event) {
        if (event.target.classList.contains("remove-slot")) {
            console.log("test");
            event.target.closest(".form-group").remove();
        }
    });
});





// 	function hide(e)
// {
//     // if(document.getElementById("hide").style.display=="none")
//     // {
//     //     document.getElementById("hide").style.display="block"

//     // }
//     // else{
//     //     document.getElementById("hide").style.display="none"
//     // }
// 	console.log(e.target.nextSibling)
// 	// document.getElementById("hide").nextSibling.previousElementSibling.style.display="block"

// }
</script>

@endif
<script>
function add() {
    let drop = document.querySelectorAll(".dropCont");
    console.log(drop)
    for (let i = 0; i < drop.length; i++) {
        drop[i].addEventListener("click", function(e) {
            // console.log(e.target)
            if (e.target.nextElementSibling.style.display == "none") {
                // e.target.nextElementSibling.style.display = "block";
                // e.target.nextElementSibling.classlist.add("show")
                // e.target.nextElementSibling.classlist.remove("hide")
            }  

			else
			{
                // e.target.nextElementSibling.style.display = "none";
                // e.target.nextElementSibling.classlist.add("hide")
                // e.target.nextElementSibling.classlist.remove("show")


            };
			 e.target.nextElementSibling.classList.toggle("hide");

            // (e.target.nextElementSibling.style.display == "none")? e.target.nextElementSibling.style.display = "block":  e.target.nextElementSibling.style.display = "none";
        })
    }
}

function del() {
    let delete_e = document.querySelectorAll(".delete");
    for (let i = 0; i < delete_e.length; i++) {
        delete_e[i].addEventListener("click", function(e) {
            // console.log(e.target.parentElement)
            e.target.parentElement.parentElement.nextElementSibling.remove();
            e.target.parentElement.parentElement.remove();

        })
    }
}
</script>
<!-- basic
<div class="mb-5" x-data="{ active: 1 }">
    <div class="space-y-2 font-semibold">
        <div class="border border-[#d3d3d3] rounded dark:border-[#1b2e4b]">
            <button type="button" class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]" :class="{'!text-primary' : active === 1}" x-on:click="active === 1 ? active = null : active = 1">Collapsible Group Item #1
                <div class="ltr:ml-auto rtl:mr-auto" :class="{'rotate-180' : active === 1}">
                    <svg> ... </svg>
                </div>
            </button>
            <div x-cloak x-show="active === 1" x-collapse>
                <div class="space-y-2 p-4 text-white-dark text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>

        <div class="border border-[#d3d3d3] dark:border-[#1b2e4b] rounded">
            <button type="button" class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]" :class="{'!text-primary' : active === 2}" x-on:click="active === 2 ? active = null : active = 2">Collapsible Group Item #2
                <div class="ltr:ml-auto rtl:mr-auto" :class="{'rotate-180' : active === 2}">
                    <svg> ... </svg>
                </div>
            </button>
            <div x-cloak x-show="active === 2" x-collapse>
                <div class="p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                    <ul class="space-y-1">
                        <li><a href="javascript:;">Apple</a></li>
                        <li><a href="javascript:;">Orange</a></li>
                        <li><a href="javascript:;">Banana</a></li>
                        <li><a href="javascript:;">list</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border border-[#d3d3d3] dark:border-[#1b2e4b] rounded">
            <button type="button" class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]" :class="{'!text-primary' : active === 3}" x-on:click="active === 3 ? active = null : active = 3">Collapsible Group Item #3
                <div class="ltr:ml-auto rtl:mr-auto" :class="{'rotate-180' : active === 3}">
                    <svg> ... </svg>
                </div>
            </button>
            <div x-cloak x-show="active === 3" x-collapse>
                <div class="p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                    <button type="button" class="btn btn-primary mt-4">Accept</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- script -->
<!-- <script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("collapse", () => ({
            collapse: false,

            collapseSidebar() {
                this.collapse = !this.collapse;
            },
        }));

        Alpine.data("dropdown", (initialOpenState = false) => ({
            open: initialOpenState,

            toggle() {
                this.open = !this.open;
            },
        }));
    });
</script> -->