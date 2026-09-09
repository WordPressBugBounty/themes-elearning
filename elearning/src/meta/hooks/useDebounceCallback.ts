import { useCallback, useRef } from 'react';

export const useDebounceCallback = <T extends (...args: any[]) => any>(
	callback: T,
	delay = 250,
) => {
	const timeout = useRef<ReturnType<typeof setTimeout> | undefined>(
		undefined,
	);

	const debouncedCallback = useCallback(
		(...args: Parameters<T>) => {
			clearTimeout(timeout.current);
			timeout.current = setTimeout(() => {
				callback(...args);
			}, delay);
		},
		[callback, delay],
	);

	return debouncedCallback;
};
