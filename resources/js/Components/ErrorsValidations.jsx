export default function ErrorsValidations({ message }) {
    return message ? (
        <p className={'text-sm text-red-600 '}>
            {message}
        </p>
    ) : null;
}
