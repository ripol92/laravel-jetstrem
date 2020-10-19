<template>
        <jet-form-section @submitted="storeSubscriber">
            <template #title>
                Adding new subscriber
            </template>
            <template #form>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="first_name" value="First name" />
                    <jet-input id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name" ref="first_name" autocomplete="first-name" />
                    <jet-input-error :message="form.error('first_name')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="last_name" value="Last name" />
                    <jet-input id="last_name" type="text" class="mt-1 block w-full" v-model="form.last_name" autocomplete="last-name" />
                    <jet-input-error :message="form.error('last_name')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="email" value="Email" />
                    <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" autocomplete="email" />
                    <jet-input-error :message="form.error('email')" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                        Saved.
                    </jet-action-message>

                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </jet-button>
                </div>
            </template>
        </jet-form-section>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import JetActionMessage from './../../Jetstream/ActionMessage'
    import JetButton from './../../Jetstream/Button'
    import JetFormSection from './../../Jetstream/FormSection'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetLabel from './../../Jetstream/Label'

    export default {
        props: ['sessions'],

        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },

        data() {
            return {
                form: this.$inertia.form({
                    first_name: '',
                    last_name: '',
                    email: '',
                }, {
                    bag: 'storeSubscriber',
                }),
            }
        },

        methods: {
            storeSubscriber(){
                this.form.post(route('subscribers.store'))
            }
        }
    }
</script>
