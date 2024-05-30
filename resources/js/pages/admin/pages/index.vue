<script setup>
import Admin from "@/layouts/admin.vue"
import { Link } from "@inertiajs/vue3"

defineOptions({
	layout: Admin,
})

defineProps({
	pages: {
		type: Object,
		required: true,
	},
})
</script>

<template>
	<div>
		<table>
			<tbody>
				<tr
					v-for="page in pages.data"
					:key="page.id"
				>
					<td>
						{{ page.title }}
					</td>
					<td>
						<Link
							:href="
								route('pages.show', {
									id: page.id,
								})
							"
						>
							Show
						</Link>
					</td>
					<td>
						<Link
							:href="
								route('pages.edit', {
									id: page.id,
								})
							"
						>
							Edit
						</Link>
					</td>
				</tr>
			</tbody>
			<tfoot>
				<Link
					v-if="pages.prev_page_url"
					:only="['pages']"
					:href="pages.prev_page_url"
				>
					Previous
				</Link>
				<Link
					v-if="pages.next_page_url"
					:only="['pages']"
					:href="pages.next_page_url"
				>
					Next
				</Link>
			</tfoot>
		</table>
	</div>
</template>
