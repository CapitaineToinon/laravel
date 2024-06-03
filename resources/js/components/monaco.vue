<script setup>
import * as monaco from "monaco-editor"
import editorWorker from "monaco-editor/esm/vs/editor/editor.worker?worker"

self.MonacoEnvironment = {
	getWorker(_, label) {
		return new editorWorker()
	},
}

const el = ref()

const query = defineModel({
	type: String,
	default: () => "",
})

const model = monaco.editor.createModel(query.value, "markdown")

onMounted(() => {
	monaco.editor.create(el.value, {
		model,
		minimap: {
			enabled: false,
		},
		wordWrap: true,
	})

	model.onDidChangeContent(() => {
		query.value = model.getValue()
	})
})
</script>

<template>
	<div
		class="min-h-[500px] border"
		ref="el"
	></div>
</template>
