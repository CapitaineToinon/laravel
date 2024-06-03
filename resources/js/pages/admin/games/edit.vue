<script setup>
import Admin from "@/layouts/admin.vue"
import { useForm } from "@inertiajs/vue3"
import Monaco from "@/components/monaco.vue"

defineOptions({
	layout: Admin,
})

const props = defineProps({
	id: {
		type: Number,
		required: true,
	},
	name: {
		type: String,
		required: true,
	},
})

const form = useForm({
	name: props.name,
})

function submit() {
	form.patch(
		route("games.update", {
			id: props.id,
		}),
	)
}
</script>

<template>
	<article>
		<form
			@submit.prevent="submit"
			class="flex w-full max-w-md flex-col"
		>
			<input
				v-model="form.name"
				type="text"
			/>
			<button type="submit">Submit</button>
		</form>
	</article>
</template>
