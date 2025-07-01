@props(['class' => ''])

<button x-data="{
        darkMode: localStorage.getItem('darkMode') === 'true',
        toggleMode() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('darkMode', this.darkMode);
            this.$dispatch('color-scheme-changed', this.darkMode ? 'dark' : 'light');
        }
    }" @click="toggleMode()" type="button" {!! $attributes->merge(['class' => "flex items-center $class"]) !!}>
    <span x-show="!darkMode" class="mr-2">🌞</span>
    <span x-show="darkMode" class="mr-2">🌙</span>
    <span x-text="darkMode ? 'Dark Mode' : 'Light Mode'"></span>
</button>
