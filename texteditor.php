<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<textarea name="detail" id="detail"></textarea>
<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('detail');
function CKupdate() {
for (instance in CKEDITOR.instances)
CKEDITOR.instances[instance].updateElement();
}
</script>