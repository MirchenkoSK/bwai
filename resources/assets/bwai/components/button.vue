<template>

    <button :type="type" :class="class">
        <slot />
    </button>

</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'button',
        },
        color: {
            type: String,
            default: null,
        },
        disabled: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            baseCalss: [
                'inline-flex',
                'items-center',
                'px-4',
                'py-2',
                'border',
                'border-transparent',
                'rounded-md',
                'font-semibold',
                'text-xs',
                'uppercase',
                'tracking-widest',
                'focus:outline-none',
                'transition',
                'ease-in-out',
                'duration-150'
            ],
        }
    },
    computed: {
        class() {
            this.baseCalss.push(this.getColor())
            if (this.disabled) {
                this.baseCalss.push('opacity-50 pointer-events-none')
            }
            if (this.color == null) {
                this.baseCalss.push('text-dark-300 hover:text-black dark:text-light-300 dark:hover:text-white')
            } else {
                this.baseCalss.push('text-white dark:text-black')
            }
            return this.baseCalss
        },
    },
    methods: {
        getColor() {
            let str
            switch (this.color) {
                case 'red':
                    str = 'bg-red hover:bg-red-dark active:bg-red-dark dark:hover:bg-red-light dark:active:bg-red-light focus:border-red shadow-outline-red'
                    break;
                case 'green':
                    str = 'bg-green hover:bg-green-dark active:bg-green-dark dark:hover:bg-green-light dark:active:bg-green-light focus:border-green shadow-outline-green'
                    break;
                case 'yellow':
                    str = 'bg-yellow hover:bg-yellow-dark active:bg-yellow-dark dark:hover:bg-yellow-light dark:active:bg-yellow-light focus:border-yellow shadow-outline-yellow'
                    break;
                case 'blue':
                    str = 'bg-blue hover:bg-blue-dark active:bg-blue-dark dark:hover:bg-blue-light dark:active:bg-blue-light focus:border-blue shadow-outline-blue'
                    break;
                case 'purple':
                    str = 'bg-purple hover:bg-purple-dark active:bg-purple-dark dark:hover:bg-purple-light dark:active:bg-purple-light focus:border-purple shadow-outline-purple'
                    break;
                case 'aqua':
                    str = 'bg-aqua hover:bg-aqua-dark active:bg-aqua-dark dark:hover:bg-aqua-light dark:active:bg-aqua-light focus:border-aqua shadow-outline-aqua'
                    break;
                case 'orange':
                    str = 'bg-orange hover:bg-orange-dark active:bg-orange-dark dark:hover:bg-orange-light dark:active:bg-orange-light focus:border-orange shadow-outline-orange'
                    break;
                case 'gray':
                    str = 'bg-gray hover:bg-gray-dark active:bg-gray-dark dark:hover:bg-gray-light dark:active:bg-gray-light focus:border-gray shadow-outline-gray'
                    break;
                default:
                    str = 'bg-transparent focus:border-transparent shadow-outline-transparent'
            }
            return str
        }
    }
}
</script>
