<script setup>
import { Link } from "@inertiajs/vue3"

const props = defineProps({
	layout: {
		type: Object,
		required: true,
	},
})
</script>

<template>
	<nav class="mb-2 border-b">
		<ul class="flex h-12 items-center gap-2">
			<li
				v-for="[label, href] in layout.menu"
				:key="href"
			>
				<Link :href="href">
					{{ label }}
				</Link>
			</li>
		</ul>
	</nav>
	<slot />
</template>
