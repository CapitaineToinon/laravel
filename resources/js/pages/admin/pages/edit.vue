<script setup>
import Admin from "@/layouts/admin.vue"
import { useForm } from "@inertiajs/vue3"

defineOptions({
	layout: Admin,
})

const props = defineProps({
	page: {
		type: Object,
		required: true,
	},
})

const form = useForm({
	title: props.page.title,
	content: props.page.content,
})

function submit() {
	form.patch(
		route("pages.update", {
			id: props.page.id,
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
				v-model="form.title"
				type="text"
			/>
			<textarea v-model="form.content" />
			<button type="submit">Submit</button>
		</form>
	</article>
</template>
