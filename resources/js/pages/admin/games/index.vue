<script setup>
import Admin from "@/layouts/admin.vue"
import { Link } from "@inertiajs/vue3"

defineOptions({
	layout: Admin,
})

defineProps({
	games: {
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
					v-for="game in games.data"
					:key="game.id"
				>
					<td>
						{{ game.name }}
					</td>
					<td>
						<Link
							:href="
								route('games.show', {
									id: game.id,
								})
							"
						>
							Show
						</Link>
					</td>
					<td>
						<Link
							:href="
								route('games.edit', {
									id: game.id,
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
					v-if="games.prev_page_url"
					:only="['games']"
					:href="games.prev_page_url"
				>
					Previous
				</Link>
				<Link
					v-if="games.next_page_url"
					:only="['games']"
					:href="games.next_page_url"
				>
					Next
				</Link>
			</tfoot>
		</table>
	</div>
</template>
