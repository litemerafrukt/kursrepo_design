---
titleBreadcrumb: Testsida
...
# Testsida

Denna sida finns här för att testa markdown och anax-flat.

Test av en javascript-komponent med Vue-js (baklängeskonverterare):

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.min.js"></script>

<div id="reverseit">
    <input v-model="text" />
    <p>
    <h4>&nbsp;{{ reverseText }}</h4>
    </p>
</div>

<script>
    new Vue({
        el: '#reverseit',

        data: {
            text: ''
        },

        computed: {
            reverseText: function () {
                return this.text.split('').reverse().join('');
            }
        }
    });
</script>

Koden för komponenten:
```js
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.min.js"></script>

<div id="reverseit">
    <input v-model="text" />
    <p>
    <h4>&nbsp;{{ reverseText }}</h4>
    </p>
</div>

<script>
    new Vue({
        el: '#reverseit',

        data: {
            text: ''
        },

        computed: {
            reverseText: function () {
                return this.text.split('').reverse().join('');
            }
        }
    });
</script>
```


