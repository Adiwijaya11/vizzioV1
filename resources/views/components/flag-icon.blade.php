@props(['code', 'class' => 'w-5 h-3.5'])

@php
    $flag = strtolower($code);
@endphp

@switch($flag)
    @case('id')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <g fill-rule="evenodd">
                <path fill="#e70011" d="M0 0h640v240H0z"/>
                <path fill="#ffffff" d="M0 240h640v240H0z"/>
            </g>
        </svg>
        @break

    @case('gb')
    @case('en')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <path fill="#012169" d="M0 0h640v480H0z"/>
            <path fill="#fff" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-179L0 64V0h75z"/>
            <path fill="#c8102e" d="m424 288 216 159v33h-44L380 320l44-32zM240 192 24 33V0h44l216 160-44 32zm376-32L400 0h64l176 130v30zM0 322l176-130h64L0 352v-30z"/>
            <path fill="#fff" d="M240 0h160v480H240zM0 160h640v160H0z"/>
            <path fill="#c8102e" d="M267 0h106v480H267zM0 187h640v106H0z"/>
        </svg>
        @break

    @case('jp')
    @case('ja')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <path fill="#ffffff" d="M0 0h640v480H0z"/>
            <circle cx="320" cy="240" r="144" fill="#bc002d"/>
        </svg>
        @break

    @case('kr')
    @case('ko')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <path fill="#ffffff" d="M0 0h640v480H0z"/>
            <circle cx="320" cy="240" r="120" fill="#c60c30"/>
            <path fill="#003478" d="M200 240a120 120 0 0 0 240 0 60 60 0 0 0-120 0 60 60 0 0 1-120 0z"/>
            <circle cx="260" cy="240" r="60" fill="#c60c30"/>
            <circle cx="380" cy="240" r="60" fill="#003478"/>
            <g fill="#000" stroke="#000" stroke-width="4">
                <path d="M120 100l30 30M135 85l30 30M150 70l30 30M490 100l-30 30M475 85l-30 30M460 70l-30 30"/>
            </g>
        </svg>
        @break

    @case('cn')
    @case('zh-cn')
    @case('zh')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <path fill="#de2910" d="M0 0h640v480H0z"/>
            <polygon fill="#ffde00" points="100,50 115,95 160,95 125,120 140,165 100,140 60,165 75,120 40,95 85,95"/>
            <circle cx="200" cy="60" r="12" fill="#ffde00"/>
            <circle cx="240" cy="100" r="12" fill="#ffde00"/>
            <circle cx="240" cy="150" r="12" fill="#ffde00"/>
            <circle cx="200" cy="190" r="12" fill="#ffde00"/>
        </svg>
        @break

    @case('sa')
    @case('ar')
    @case('ae')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <path fill="#00732f" d="M0 0h640v160H0z"/>
            <path fill="#ffffff" d="M0 160h640v160H0z"/>
            <path fill="#000000" d="M0 320h640v160H0z"/>
            <path fill="#ff0000" d="M0 0h180v480H0z"/>
        </svg>
        @break

    @case('de')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <path fill="#000000" d="M0 0h640v160H0z"/>
            <path fill="#dd0000" d="M0 160h640v160H0z"/>
            <path fill="#ffce00" d="M0 320h640v160H0z"/>
        </svg>
        @break

    @case('fr')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <path fill="#002395" d="M0 0h213v480H0z"/>
            <path fill="#ffffff" d="M213 0h214v480H213z"/>
            <path fill="#ed2939" d="M427 0h213v480H427z"/>
        </svg>
        @break

    @case('es')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <path fill="#aa151b" d="M0 0h640v120H0z"/>
            <path fill="#f1bf00" d="M0 120h640v240H0z"/>
            <path fill="#aa151b" d="M0 360h640v120H0z"/>
        </svg>
        @break

    @case('ru')
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10" viewBox="0 0 640 480" aria-hidden="true">
            <path fill="#ffffff" d="M0 0h640v160H0z"/>
            <path fill="#0039a6" d="M0 160h640v160H0z"/>
            <path fill="#d52b1e" d="M0 320h640v160H0z"/>
        </svg>
        @break

    @default
        <svg class="{{ $class }} rounded-[3px] shrink-0 shadow-[0_1px_2px_rgba(0,0,0,0.12)] border border-black/10 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>
        </svg>
@endswitch

